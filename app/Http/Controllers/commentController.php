<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\comment;
use App\books;

class commentController extends Controller
{
    public function comments($id,Request $request){
    	$idBooks= $id;
    	$comment= new comment;
    	$comment->idBooks=$idBooks;
    	$comment->idStudent=Auth::guard('students')->user()->id;
        $comment->headline=$request->headline;
    	$comment->content=$request->content;
    	$comment->save();
    	return redirect("books/$id")->with('error','Your comment has been posted successfully!');

    }
    public function getDelete($id,$idbooks){
    	
    	$comment= comment::find($id);
    	$comment->delete();
    	
    	return redirect('admin/books/edit/'.$idbooks)->with('warning','You deleted a comment successfully!');

    }
}
