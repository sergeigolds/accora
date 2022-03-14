<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image_src' => 'required|image|max:8192,'
        ];

        if ($this->ad) {
            $rules['image_src'] = 'nullable|image|max:8192,';
        }

        return $rules;
    }
}
