<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {


        if ($request->user()->id != $request->query('id')) {
            throw new AuthorizationException;
        }

        //check email status
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('index');
        }

        //verify
        Auth::user()->markEmailAsVerified();

        session()->forget('verifyEmailStatus');

        //redirect
        ToastMagic::success( __('messages.Your-email-has-been-verified'));
        return redirect()->route('index');
    }
}
