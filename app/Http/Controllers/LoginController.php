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
<<<<<<< HEAD
        else{
        Session::flash('login-error','Tài khoản không chính xác!');
=======
        Session::flash('login-error','Account or password is incorrect!');
>>>>>>> 0124c87ae0ed42c1b82df6c7aad6d04e5016ecb8
        return redirect()->route('showFormLogin');
        }
    }
}
