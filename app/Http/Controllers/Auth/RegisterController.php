<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Notification;
use App\Notifications\verifyEmail;

class RegisterController extends Controller
{

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getRegister()
    {
        return view('auth.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function postRegister(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'first_name' => 'required|max:32',
            'last_name' => 'required|max:32',
            'username' => 'required|unique:users,username|max:64',
            'email' => 'required|email|unique:users,email|max:32',
            'password' => 'required',
        ]);


        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

       
        if($request->password != $request->password_confirmation)
        {
            Session::flash('warning','Passsword does not matche.Please confirm your password!');
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $user = User::create([
            'first_name'=>trim($request->first_name),
            'last_name'=>trim($request->last_name),
            'username'=>trim($request->usename),
            'email'=>trim($request->email),
            'password'=>bcrypt($request->password),
            'email_verification_token'=>str_random(32),
            ]);

        $user->notify(new verifyEmail($user));
        Session::flash('success','Registration successfull!');
        return redirect()->route('alert.verify');

    }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\User
    //  */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
