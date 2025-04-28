<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $response =  Password::broker()->sendResetLink($request->only('email'));

        if ($response === Password::RESET_LINK_SENT) {
            ToastMagic::success('messages.reset_link_was_sent');
            return back();
        }

        ToastMagic::error(__('messages.reset-link-failed'));
        return  back();

    }
}
