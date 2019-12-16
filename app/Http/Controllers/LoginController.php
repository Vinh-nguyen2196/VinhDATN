<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route("admin.getDashboards");
        }
        else{
        Session::flash('login-error','Tài khoản không chính xác!');
        return redirect()->route('showFormLogin');
        }
    }
}
