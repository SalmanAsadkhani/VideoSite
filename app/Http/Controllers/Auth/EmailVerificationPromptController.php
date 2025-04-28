<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class EmailVerificationPromptController extends Controller
{


    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('index');
        }

        Auth::user()->sendEmailVerificationNotification();
        ToastMagic::success(__('messages.sent_verification_link'));
        return redirect()->route('index');
    }
}
