<?php
namespace App\Http\Controllers\Web\HomePage;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return view('web.homepage.index');
    }
}
