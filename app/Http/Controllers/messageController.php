<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\message;
use App\student;
use App\User;
use Illuminate\Support\Facades\Auth;

class messageController extends Controller
{
    public function getList(){
        $message=message::orderBy('id','DESC')->get();
     	return view('admin.message.listmessage',['message'=>$message]); 	
    }
    public function getAdd(){
        $student=student::all();
     	return view('admin.message.addmessage',['student'=>$student]); 	
    }
     public function postAdd(Request $request){
     	$this->validate($request,[
            'studentid'=>'required',
            'content'=>'required|max:500'
        ]);

     	$message = new message;

     	$getid=student::where('student_id',$request ->studentid)->pluck('id');

     	$message->idStudent=$getid[0];
     	$message->content=$request->content;
     	$message->idUser=Auth::user()->id;
        $message->status=0;
     	$message-> save();
     	return redirect('admin/message/add')->with('warning','Your message is sent successfully');
    }
    public function getDelete($id){
        $message= message::find($id);
        $message->delete();
        return redirect('admin/message/list')->with('warning','You deleted a message successfully!');
    }
    
}
