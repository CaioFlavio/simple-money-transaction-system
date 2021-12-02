<?php

namespace App\Infrastructure\Requests\Api\UserWallet;

use Illuminate\Foundation\Http\FormRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckBalanceRequest extends FormRequest
{
    public function authorize()
    {
        return (JWTAuth::getPayload()->get('sub') == $this->route('id'));
    }

    public function rules()
    {
        return [];
    }
}
