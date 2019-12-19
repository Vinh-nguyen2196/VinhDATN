<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function create(Request $request, $id)
    {
        $comment = new Comments();
        $comment->id_prd = $id;
        $comment->id_user_comment = Auth::user()->id;
        $comment->content_cmt = $request->body;
        $comment->save();
        return redirect()->route('chitietsanpham',$id);
    }
}
