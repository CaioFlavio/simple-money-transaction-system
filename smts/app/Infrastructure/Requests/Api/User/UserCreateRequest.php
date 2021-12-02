<?php

namespace App\Infrastructure\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function authorize()
    {
        //todo: add authorization rules
        return true;
    }

    public function rules()
    {
        return [
            'name'              => 'required',
            'email'             => 'required|email:rfc,dns|unique:users,email',
            'account_type'      => 'required|in:personal,business',
            'document_number'   => 'required|unique:users,document_number',
            'password'          => 'required',
        ];
    }
}
