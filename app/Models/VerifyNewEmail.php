<?php

namespace App\Models;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyNewEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $pendingUserEmail;

    public function __construct(Model $pendingUserEmail)
    {
        $this->pendingUserEmail = $pendingUserEmail;
    }

    public function build()
    {
        $this->subject(__('Verify Email Address'));

        return $this->markdown('auth.email.verifyNewEmail', [
            'url' => $this->pendingUserEmail->verificationUrl(),
        ]);
    }
}
