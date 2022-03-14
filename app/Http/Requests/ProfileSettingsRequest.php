<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileSettingsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|regex:/^[+]?\d+$/|min:6',
            'old_password' => 'nullable|required_with:new_password|password',
            'new_password' => 'nullable|required_with:old_password|min:6|confirmed|different:old_password',
        ];
    }
}
