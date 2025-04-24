<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback($driver)
    {
        $googleuser = Socialite::driver($driver)->user();


        $user = User::updateOrCreate(
            ['email' => $googleuser->getEmail()],
            [
                'name' => $googleuser->getName(),
                'avatar' => $googleuser->getAvatar(),
                'password' => bcrypt(Str::random(16)),
                'email_verified_at' => now()->toDateTimeString()
            ]
        );


        Auth::login($user);
        return redirect('/')->with('success',__('messages.You are now logged in'));
    }
}
