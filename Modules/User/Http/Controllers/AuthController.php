<?php


namespace Modules\User\Http\Controllers;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Http\Requests\LoginRequest;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    public function loginAction(){
        return view('user::auth.login');
    }

    public function username()
    {
        return 'user_name';
    }

    public function postLoginAction(LoginRequest $request){
        $login = [
            'user_name' => $request->user_name,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('status','Email hoặc Password không chính xác');
        }
    }
}