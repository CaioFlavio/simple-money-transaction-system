<?php
namespace App\Http\Controllers\Web\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function indexAction()
    {
        return view('web.user.login.index');
    }
}
