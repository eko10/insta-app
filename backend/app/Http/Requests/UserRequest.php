<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function rules()
    {
        $userId = auth()->id();

        return [
            'name' => 'nullable|string|max:100',

            'username' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($userId)
            ],

            'email' => [
                'nullable',
                'email',
                Rule::unique('users', 'email')->ignore($userId)
            ],

            'password' => 'nullable|min:6',

            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ];
    }
}
