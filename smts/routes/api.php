<?php

use App\Http\Controllers\Api\User\UserRestController;
use App\Http\Controllers\Api\User\UserWalletRestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('users', [UserRestController::class, 'create']);
Route::post('users/auth', [UserRestController::class, 'auth']);

Route::middleware(['jwt.auth'])->group(function(){
    Route::post('users/{id}/add_funds', [UserWalletRestController::class, 'add']);
    Route::post('users/{id}/withdraw_funds', [UserWalletRestController::class, 'withdraw']);
});
