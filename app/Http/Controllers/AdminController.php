<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;
use App\User;
use App\Productype;
use App\Comments;
use App\product;
use DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function getDashboard()
    {
        $data['user'] = User::all();
        $data['comment'] = Comments::all();
        $data['product'] = product::all();
        return view('admin.sub_admin', $data);
    }

    function getCategory()
    {
        $data['type'] = Productype::all();
        return view('admin.category', $data);
    }

    function getProduct()
    {
        $data['product'] = product::paginate(8);
        return view('admin.product', $data);
    }

    function getComment()
    {
        $data['comment'] = Comments::paginate(8);
        return view('admin.comment', $data);
    }

    function deleteComment($id)
    {
        Comments::destroy($id);
        toastr()->success('Xóa bình luận thành công !');
        return redirect()->route('comments.index');
    }
}

?>
