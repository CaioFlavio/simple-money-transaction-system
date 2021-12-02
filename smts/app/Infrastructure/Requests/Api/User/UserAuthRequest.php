<?php

namespace App\Infrastructure\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class UserAuthRequest extends FormRequest
{
    public function authorize()
    {
        //todo: add authorization rules
        return true;
    }

    public function rules()
    {
        return [
            'email'             => 'required|email:rfc|exists:users,email',
            'password'          => 'required',
        ];
    }
}
