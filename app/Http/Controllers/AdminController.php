<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;
use App\User;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function getDashboard(){
		return view('admin.sub_admin');
	}
}

?>
