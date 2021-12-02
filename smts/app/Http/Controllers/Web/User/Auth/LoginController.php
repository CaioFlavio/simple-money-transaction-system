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

    public function proceedAction(Request $request)
    {
        $response = json_decode($request->input('response'), true);
        if (array_key_exists('errors', $response)) {
            return back()->with('error', $response['errors']);
        }

        return redirect('/user/dashboard?token='.$response['token'])->with('success', 'Registered successfully');
    }
}
