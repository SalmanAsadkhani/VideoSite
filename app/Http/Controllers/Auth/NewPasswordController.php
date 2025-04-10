<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $email  = $request->query('email');
        $token  = $request->query('token');
        return view('auth.reset-password' , compact('email' ,  'token'));
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        // check email password
        $response = Password::broker()->reset(
            [

                'token' => $request->get('token'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'password_confirmation' => $request->get('password_confirmation'),


                // change password
            ], function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($response === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('passwordChanged' , true);
        }

        return  back()->with('cantChangePassword' , true);
    }
}
