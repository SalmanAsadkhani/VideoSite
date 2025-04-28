<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;

class CheckVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->hasVerifiedEmail()) {
            return $next($request);
        }
        ToastMagic::warning(__('messages.please_verify_your_email'));
        return redirect()->route('index');
    }
}
