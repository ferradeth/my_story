<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|exists:users|email',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Поле ":attribute" обязательно для заполнения'
        ];
    }
    public function attributes()
    {
        return [
            'password' => 'пароль',
        ];
    }
}
