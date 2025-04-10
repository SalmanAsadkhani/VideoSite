<?php
namespace App\Services;

use App\Models\User;
use App\Services\Notification\Providers\Contracts\Provider;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;


class Notification
{


    public function sendEmail(User $user , Mailable $mailable)
    {
        Mail::to($user)->send($mailable);
    }

    public function SendOtpCode(User $user , Mailable $mailable)
    {
        Mail::to($user)->send($mailable);
    }

}
