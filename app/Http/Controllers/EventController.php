<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

                $user->events()->attach($event->id);

                return response()->json([
                    'message' => 'successful',
                    'code' => '200'
                ]);
            }

            $user = User::create([
                'church_id' => $event->church_id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $profile = new Profile;
            $profile->user_id = $user->id;
            $profile->phone = $request->phone;
            $profile->email = $request->email;
            $profile->title = $request->title;
            $profile->church_id = $event->church_id;
            $profile->save();

            $user->events()->attach($event->id);

            Auth::loginUsingId($user->id);

            return response()->json([
                'message' => 'successful',
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
        $event = \App\Models\Event::where('slug', $slug)->first();

        if(Auth::check()){
            $user  = auth()->user()->load('profile');
        }else{
            $user = null;
        }


        return view('events.index',compact('event', 'user'));
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
}
