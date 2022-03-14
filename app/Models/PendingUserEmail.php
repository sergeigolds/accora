<?php

namespace App\Models;

use Illuminate\Auth\Events\Verified;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Traits\Tappable;

class PendingUserEmail extends Model
{
    use Tappable;

    const UPDATED_AT = null;

    protected $guarded = [];

    public function user()
    {
        return $this->morphTo('user');
    }

    public function scopeForUser($query, Model $user)
    {
        $query->where([
            $this->qualifyColumn('user_type') => get_class($user),
            $this->qualifyColumn('user_id') => $user->getKey(),
        ]);
    }

    public function activate()
    {
        $user = $this->user;

        $dispatchEvent = !$user->hasVerifiedEmail() || $user->email !== $this->email;

        $user->email = $this->email;
        $user->save();
        $user->markEmailAsVerified();

        static::whereEmail($this->email)->get()->each->delete();

        $dispatchEvent ? event(new Verified($user)) : null;
    }

    public function verificationUrl()
    {
        return URL::temporarySignedRoute(
            config('verify-new-email.route') ?: 'pendingEmail.verify',
            now()->addMinutes(config('auth.verification.expire', 60)),
            ['token' => $this->token]
        );
    }
}
