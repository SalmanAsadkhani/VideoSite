<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;


    private $user;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */


    /**
     * Get the message content definition.
     */
//    public function content(): Content
//    {
//        return new Content(
//            markdown: 'emails.VerificationEmail',with: [
//                'link' =>  $this->urlGenerate(),
//                'name'  => $this->user->name,
//        ]
//
//        );
//    }

    public function build()
    {
        return $this->markdown('emails.VerificationEmail')->with(
            [
                'link' => $this->urlGenerate(),
                'name'  => $this->user->name,
            ]
        );

    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }


    protected function urlGenerate()
    {
      return ( URL::temporarySignedRoute('verification.verify', now()->addMinutes(5),
          [
              'id' => $this->user->id,
          ]));


    }
}
