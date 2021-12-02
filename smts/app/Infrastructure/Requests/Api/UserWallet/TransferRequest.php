<?php

namespace App\Infrastructure\Requests\Api\UserWallet;

use Illuminate\Foundation\Http\FormRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class TransferRequest extends FormRequest
{
    public function authorize()
    {
        return (JWTAuth::getPayload()->get('sub') == $this->route('id'));
    }

    public function rules()
    {
        return [
            'value' => 'gt:0',
            'email' => 'exists:users,email'
        ];
    }
}
