<?php

namespace App\Http\Traits;

use App\Http\InvalidVerificationLinkException;
use App\Models\PendingUserEmail;
use Illuminate\Support\Facades\Auth;

trait VerifiesPendingEmails
{
    public function verify(string $token)
    {
        $user = app(PendingUserEmail::class)->whereToken($token)->firstOr(['*'], function () {
            throw new InvalidVerificationLinkException(
                __('The verification link is not valid anymore.')
            );
        })->tap(function ($pendingUserEmail) {
            $pendingUserEmail->activate();
        })->user;

        Auth::guard()->login($user, false);

        return $this->authenticated();
    }

    protected function authenticated()
    {
        return redirect('/account/profile-settings')->with('verified', true);
    }
}
