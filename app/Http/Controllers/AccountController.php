<?php

namespace App\Http\Controllers;


use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(User $user)
    {
        $ads = Ad::where('user_id', Auth::user()->id)->paginate(5);

        return view('account.index', [
            'ads' => $ads
        ]);
    }

    public function showProfileSettings() {
        return view('account.profile-settings');
    }



}
