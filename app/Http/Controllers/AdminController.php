<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;
use App\User;
use DB;

class AdminController extends Controller{
	public function getDarboard(){
		return view('admin.sub_admin');
	}
	public function getUser(){
		$user=User::all();
		return view('admin.user',compact('user'));
	}
	public function getCategory(){
		return view('admin.category');
	}
	public function getProduct(){
		return view('admin.product');
	}
	function getLogin(){
		return view('admin.login');
	}
	function postLogin(LoginRequest $r){
		echo 'thanh cong';
		$email=$r->email;
		$password=$r->password;
		
        
        if (Auth::attempt(['email' => $email, 'password' => $password])==true) {
            return redirect('admin');
        } else {
            return redirect()->back()->withErrors(['email'=>'tai khoan mat khau k chinh xac'])->withInput();
        }
	}
	function getLogout(){
		        Auth::logout();
        return redirect('login');
	}

}

?>