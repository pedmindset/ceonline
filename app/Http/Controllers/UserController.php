<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Church;
use App\Models\Profile;
use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Display  resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::where('id', $request->user()->id)->with('profile')->first();
        
        $churches = Church::all();

        return view('accounts.index', compact('user', 'churches'));
    }


    /**
     * Update a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile_update(Request $request)
    {
        $validateDate = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'church' => 'required',
            'phone' => 'nullable|min:9|max:12',
            'email' => 'nullable',
            'kings_chat' => 'nullable|min:9|max:12',
            'date_of_birth' => 'nullable',
            'marital_status' => 'nullable',
        ]);

        $user = $request->user();
        $user->name = $request->name;
        $user->church_id = $request->church;
        $user->save();

        $profile = $user->profile;
        $profile->name = $request->name;
        $profile->church_id = $request->church;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->kings_chat = $request->kings_chat;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->marital_status = $request->marital_status;
        $profile->save();

        toastr()->success('Profile updated successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   
}
