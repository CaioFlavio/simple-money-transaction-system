<?php

use App\Http\Controllers\Web\HomePage\IndexController as HomePageIndex;
use App\Http\Controllers\Web\User\Auth\LoginController as UserLogin;
use App\Http\Controllers\Web\User\Auth\RegisterController as UserRegister;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomePageIndex::class, 'indexAction']);

Route::get('/register', [UserRegister::class, 'indexAction']);
Route::get('/register/new', [UserRegister::class, 'createAction']);
Route::get('/login', [UserLogin::class, 'indexAction']);
