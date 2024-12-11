<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\auth\registerRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(registerRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'sex' => $request->sex,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'کاربر با موفقیت ثبت نام شد',

        ]);

    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $token = $request->user()->createToken('auth_token');

        return response()->json([
            'message' => 'ورود موفقیت آمیز بود',
            'token' => $token->plainTextToken,
        ]);


    }

    public function userInfo()
    {
        return auth()->user();
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => "همه توکن ها با موفقیت پاک شد",
        ]);}
}
