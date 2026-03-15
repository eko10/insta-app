<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'caption' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ];
    }
}
