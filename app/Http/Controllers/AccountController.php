<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProfileSettingsRequest;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->where('user_id', Auth::user()->id)->paginate();

        return view('account.index', [
            'ads' => $ads,
        ]);
    }

    public function ProfileSettings()
    {
        return view('account.profile-settings');
    }

    public function edit(ProfileSettingsRequest $request)
    {

        $user = Auth::user();

        $user->name = request('name');

        if (auth()->user()->email != $request->email) {
            auth()->user()->newEmail($request->email);
        }

        if ($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }

        $user->phone = request('phone');

        $user->save();

        return redirect()->route('profile-settings')->with('success', 'User information updated');

    }

}
