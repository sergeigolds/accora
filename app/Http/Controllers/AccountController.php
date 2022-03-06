<?php

namespace App\Http\Controllers;


use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->where('user_id', Auth::user()->id)->paginate(15);

        return view('account.index', [
            'ads' => $ads,
        ]);
    }

    public function ProfileSettings()
    {
        return view('account.profile-settings');
    }

    public function editProfileSettings(Request $request)
    {

        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|regex:/^[+]?\d+$/|min:6',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $this->validate($request, [
                'new_password' => 'required|confirmed|min:6|max:50|different:OldPassword',
                'new_password_confirmation' => 'required',
            ]);

            $user->password = Hash::make($request->new_password);
        }

        $user->name = request('name');
        $user->email = request('email');
        $user->phone = request('phone');

        $user->save();

        return redirect()->route('profile-settings')->with('success', 'User information updated');

    }

}
