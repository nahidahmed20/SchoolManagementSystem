<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function loginPage(Request $request)
    {
        return view('auth.login');
    }

    public function forgotPasswordPage()
    {
        return view('auth.forgot-password');
    }

    public function authLoginPage(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            flash()->success('Login successful.', ['title' => 'Success']);
            return redirect()->intended('dashboard');
        }else{
            flash()->error('Invalid email or password.', ['title' => 'Error']);
            return redirect()->back();
        }
    }
}
