<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Comment,Models};

class CommentController extends Controller
{
    //
    public function getComment(){
    	$data['comment'] = Comment::with('user')->orderBy('id_comment','desc')->paginate(10);
    	$data['model'] = Models::all();
    	return view('backend.comments',$data);
    }

    public function getEdit($id){
    	$data['comment'] = Comment::with('user')->find($id);
    	return view('backend.edit_comments',$data);
    }

    public function postEdit(Request $request,$id){
    	$comment = new Comment;
    	$arr['content_comment'] = $request->content_comment;
    	$arr['status_comment'] = $request->status_comment;
    	$comment::where('id_comment',$id)->update($arr);
    	return redirect('admin/comment');
    }

    public function getDel($id){
    	Comment::destroy($id);
    	return back();
    }
}
