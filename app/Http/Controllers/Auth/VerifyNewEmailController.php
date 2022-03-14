<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\VerifiesPendingEmails;

class VerifyNewEmailController extends Controller
{
    use VerifiesPendingEmails;

    public function __construct()
    {
        $this->middleware('throttle:6,1');
    }
}
