<?php
namespace App\Http\Controllers\Web\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function indexAction()
    {
       return view('web.user.register.index');
    }

    public function createAction(Request $request)
    {
        $response = json_decode($request->input('response'), true);
        if (array_key_exists('errors', $response)) {
            return back()->with('error', $response['errors']);
        }

        return redirect('/login')->with('success', 'Registered successfully');
    }

    public function loginAction(Request $request)
    {

    }
}
