<?php

namespace App\Infrastructure\Requests\Api\UserWallet;

use Illuminate\Foundation\Http\FormRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class AddFundsRequest extends FormRequest
{
    public function authorize()
    {
        return (JWTAuth::getPayload()->get('sub') == $this->route('id'));
    }

    public function rules()
    {
        return [
            'value' => 'required|numeric',
        ];
    }
}
