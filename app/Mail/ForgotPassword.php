<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use function Symfony\Component\Translation\t;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user , string $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Forgot Password',
        );
    }

    /**
     * Get the message content definition.
     */
//    public function content(): Content
//    {
//        return new Content(
//            markdown: 'emailsFogotPassword',
//        );
//    }
    public function build(){

        return $this->markdown('emails.ForgotPassword')->with(
            [
                'name' => $this->user->name,
                'link' => $this->GenerateLink()
            ]
        );
    }



    protected function GenerateLink ()
    {
        return dd( route('password.reset',['token' => $this->token  ,'email' => $this->user->email]));

    }
}
