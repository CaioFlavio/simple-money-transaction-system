<?php
namespace App\Http\Controllers\Web\User\App\Dashboard;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return view('web.user.dashboard.index');
    }
}
