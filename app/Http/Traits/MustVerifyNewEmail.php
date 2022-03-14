<?php

namespace App\Http\Traits;

use App\Models\PendingUserEmail;
use App\Models\VerifyNewEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

trait MustVerifyNewEmail
{

    public function getPendingEmail()
    {
        return $this->getEmailVerificationModel()->forUser($this)->value('email');
    }

    public function getEmailVerificationModel()
    {
        $modelClass = PendingUserEmail::class;

        return app($modelClass);
    }

    public function resendPendingEmailVerificationMail()
    {
        $pendingUserEmail = $this->getEmailVerificationModel()->forUser($this)->firstOrFail();

        return $this->newEmail($pendingUserEmail->email);
    }

    public function newEmail(string $email)
    {
        if ($this->getEmailForVerification() === $email && $this->hasVerifiedEmail()) {
            return null;
        }

        return $this->createPendingUserEmailModel($email)->tap(function ($model) {
            $this->sendPendingEmailVerificationMail($model);
        });
    }

    public function createPendingUserEmailModel(string $email)
    {
        $this->clearPendingEmail();

        return $this->getEmailVerificationModel()->create([
            'user_type' => get_class($this),
            'user_id' => $this->getKey(),
            'email' => $email,
            'token' => Password::broker()->getRepository()->createNewToken(),
        ]);
    }

    public function clearPendingEmail()
    {
        $this->getEmailVerificationModel()->forUser($this)->get()->each->delete();
    }


    public function sendPendingEmailVerificationMail(Model $pendingUserEmail)
    {
        $mailableClass = VerifyNewEmail::class;
        $mailable = new $mailableClass($pendingUserEmail);

        return Mail::to($pendingUserEmail->email)->send($mailable);
    }
}
