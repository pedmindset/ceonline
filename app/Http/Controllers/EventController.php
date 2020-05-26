<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Notifications\EventRegistration;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
            $validateData = $request->validate([
                'name' => 'nullable',
                'email' => 'nullable',
                'phone' => 'nullable',
                'title' => 'nullable',
                'password' => 'nullable',
                'expectation' => 'nullable',
            ]);

            $event = Event::find($id);

            if(Auth::check()){
                $user = Auth::user();
                $profile = $user->profile;
                $profile->phone = $request->phone;
                $profile->email = $request->email;
                $profile->title = $request->title;
                $profile->save();

                if(!($user->events()->where('event_id', $event->id)->first())){
                    $user->events()->attach($event->id);
                }

                $user->notify(new EventRegistration($user));

                return response()->json([
                    'message' => 'Successfully Registered',
                    'code' => '200'
                ]);
            }

            $password = $this->generateRandomString(5);

            try {
                $user = User::create([
                    'church_id' => $event->church_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($password)
                ]);
            } catch (\Exception $e) {

                $user = User::where('email', $request->email)->first();

                if($user){
                    $profile = new Profile;
                    $profile->user_id = $user->id;
                    $profile->phone = $request->phone;
                    $profile->name = $request->name;
                    $profile->email = $request->email;
                    $profile->title = $request->title;
                    $profile->church_id = $event->church_id;
                    $profile->save();

                    if(!($user->events()->where('event_id', $event->id)->first())){
                        $user->events()->attach($event->id);
                    }
                    Auth::loginUsingId($user->id);

                    $user->notify(new EventRegistration($user,  $password));

                    return response()->json([
                        'message' => 'Successfully Registered',
                        'code' => '200'
                    ]);
                }

                Session::put('from', 'events/' . $event->slug);

                return response()->json([
                    'message' => 'Login to Register',
                    'code' => '400'
                ]);
            }

            $profile = new Profile;
            $profile->user_id = $user->id;
            $profile->phone = $request->phone;
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->title = $request->title;
            $profile->church_id = $event->church_id;
            $profile->save();

            if(!($user->events()->where('event_id', $event->id)->first())){
                $user->events()->attach($event->id);
            }

            Auth::loginUsingId($user->id);

            $user->notify(new EventRegistration($user,  $password));

            return response()->json([
                'message' => 'Successfully Registered',
                'code' => '200'
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $event = Event::where('slug', $slug)->first();

        $user = null;

        $registered = false;

        if(Auth::check()){
            $user  = auth()->user()->load('profile');

            $registered = $user->events()->first();

        }

        if($registered){
            $registered = true;
        }


        return view('events.index',compact('event', 'user', 'registered'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
