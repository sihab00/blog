<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Session;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */
    public function getVerify()
    {
        return view('auth.verify');
    }
    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    public function verifyEmail($token)
    {
       if(is_null($token))
       {
        Session::flash('warning','Token is empty');
        return redirect()->route('alert.verify');
       }

       $user = User::where('email_verification_token',$token)->first();

       if(is_null($user))
       {
        Session::flash('warning','Invalid token');
        return redirect()->route('alert.verify');   
       }
       $user->update([
            'email_verified'=> 1,
            'email_verified_at'=>Carbon::now(),
            'email_verification_token'=>'',

        ]);
       Session::flash('success','Your account has been activeted successfully. You can login!');
       return redirect()->route('login');
    }
    
}
