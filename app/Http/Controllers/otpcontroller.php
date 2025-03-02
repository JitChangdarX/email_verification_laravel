<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Mail;


class otpcontroller extends Controller
{
    public function loginwithotppost(Request $request){
        // dd($request->all());

        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $user = User::where('email','=',$request->email)->first();
        if(is_null($user)){
            return back()->with('error','Email not found');

        }
        else{
            $otp = rand(100000,999999);
            $userupdate = user::where('email',$request->email)->update([
                'otp' => $otp
            ]);
            Mail::send('email.loginWithOTPEmail', ['otp' => $otp], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Login with OTP - chirags.in');
            });
        }

    }
}
