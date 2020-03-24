<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Church;
use App\Models\Invite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

      /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        $invite = null;
        if($request->filled('invite')){
            $invite = $request->invite;
        }

        $churches = Church::all();

        return view('auth.register', compact('churches', 'invite'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'invite' => ['nullable'],
            'title' => ['required'],
            'church' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'church_id' => $data['church'],
            'password' => Hash::make($data['password']),
        ]);

        $user->profile()->create([
            'title' => $data['title'],
            'name' => $data['name'],
            'email' => $data['email'],
            'church_id' => $data['church'],
        ]);

        if(!empty($data['invite'])){
            $invite = new Invite;
            $invite->church_id = $data['church'];
            $invite->owner_id = $data['invite'];
            $invite->user_id = $user->id;
            $invite->save();
        }

        return $user;

        
    }
}
