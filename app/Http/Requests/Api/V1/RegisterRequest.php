<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:100'],
            'surname' => ['required', 'string', 'min:5', 'max:100'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/[a-zA-Z]/',
                'regex:/[0-9]/',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'password.regex' => 'Пароль должен содержать хотя бы одну букву и одну цифру.',
        ];
    }
}
