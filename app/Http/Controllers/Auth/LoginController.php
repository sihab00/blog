<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function __construct()
    {
        $this->middleware('guest')->except('getLogout');
    }
    public function getLogin()
    {
        return view('auth.login');
    }
 public function postLogin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required',
            ]);

        if($validate->fails()){

            return redirect()->back()->withErrors($validate)->withInput();
        }

        $cradentials = $request->except('_token');
        if(auth()->attempt($cradentials))
        {
            $user = Auth::user();

            Auth::login($user, true);

            if ($user->email_verified == 0) {


                auth()->logout();

              Session::flash('warning','You have not verified your account yet!');
              return redirect()->back();
            }

            return redirect()->route('posts.index');
        }
        Session::flash('warning', ' oops! email or password is incorrect!');
        return redirect()->back();
    }
 public function getLogout()
    {
        # code...
    }

}
