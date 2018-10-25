<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\issue;
use App\books;
use App\student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\message;
use App\returns;

class issueController extends Controller
{
    public function getAdd(){
        $studentid=student::all();
        $books=books::all();
        return view('admin.issue.addissue',['studentid'=>$studentid,'books'=>$books]);
    }

    public function postAdd(Request $request){
        $this->validate($request,[
            'studentid'=>'required|exists:students,student_id',
	    	'isbn'=>'required|exists:books,isbn',
	    	'returndate'=>'required'
        ],[
            'studentid.exists'=>"The Student Id Number does not exist in the record. Please check again!",
            'isbn.exists'=>"The ISBN does not exist in the record. Please check again!"        
        ]);
        $issue = new issue;
        $count= books::where('isbn',$request ->isbn)->pluck('available');
        if($count[0]>0){
        $book= books::where('isbn',$request ->isbn)->pluck('id');
        $student=student::where('student_id',$request ->studentid)->pluck('id');        
     	$issue-> studentid= $student[0];
     	$issue-> bookid = $book[0];
     	$issue-> returndate = $request ->returndate;
     	$issue->save();
        $count= books::where('id',$issue-> bookid)->pluck('available');    
            $books= books::where('id',$issue-> bookid)->decrement('available');
            return redirect('admin/issue/list')->with('warning','You added successfully! ');
        }else{
     	  return redirect('admin/issue/add')->with('warning','The available of this book is 0. You cannot assign it');
        }
        
    }
    public function getList(){
        $issue=issue::orderBy('id','DESC')->get();
        $now = Carbon::now();      
        return view('admin.issue.listissue',['issue'=>$issue,'now'=>$now]);

    }
    
    public function getExtend($id){
        $issue=issue::find($id);
        
        return view('admin.issue.extendissue',['issue'=>$issue]);

    }
     public function postExtend(Request $request,$id){
        $this->validate($request,[
            'returndate'=>'required',
        ]);
        $issue= issue::find($id);
        $issue-> returndate = $request ->returndate;
        $issue->save();
        return redirect('admin/issue/list')->with('warning','Extend the return date successfully! ');

    }

     public function getMessage($id){
        $issue=issue::find($id);
        $now = Carbon::now();     
        return view('admin.issue.sendmessage',['issue'=>$issue,'now'=>$now]);

    }
     public function postMessage(Request $request,$id){
        $this->validate($request,[
            'content'=>'required',
        ]);
        $studentid= issue::where('id',$id)->pluck('studentid');
        $message = new message;
        $message-> idStudent = $studentid[0];
        $message-> idUser = Auth::user()->id;
        $message-> content = $request ->content;
        $message->save();
        return redirect('admin/message/add')->with('warning','Message is sent successfully! ');

    }

    // public function getReturn($id){
    //     $issue= issue::find($id);
    //     $issue->delete();
    //     $books= books::where('id',$issue-> bookid)->increment('available');
    //     return redirect('admin/issue/list')->with('warning','Thank you ! You returned the book successfully!');
    // }

    public function getReturn($id){
        $issue= issue::find($id);  
        $now = Carbon::now();     
        return view('admin.issue.returndetail',['issue'=>$issue,'now'=>$now]);


    }

    public function postReturn($id,Request $request){
        $studentid= issue::where('id',$id)->pluck('studentid');  
        $bookid= issue::where('id',$id)->pluck('bookid'); 
        $returndate= issue::where('id',$id)->pluck('returndate');  
        $issuedate= issue::where('id',$id)->pluck('created_at');
           

        $returns=new returns;       
        $returns-> studentid = $studentid[0];
        $returns-> bookid = $bookid[0];
        $returns-> duedate = $returndate[0];
        $returns-> borroweddate = $issuedate[0];
        $returns-> status = $request->status;
        $returns-> notes = $request->notes;
        $returns-> paid = $request->paid;;
        $returns->save();

        $issue= issue::find($id);
        $issue->delete();
        $books= books::where('id',$issue-> bookid)->increment('available');
        return redirect('admin/issue/list')->with('warning','Thank you ! You returned the book successfully!');

    }
    public function returnlist(){
        $returns= returns::all();
            
        return view('admin.issue.returnlist',['returns'=>$returns]);

    }
     public function geteditdetail($id){
        $returns = returns::find($id);       
        return view('admin.issue.returnedit',['returns'=>$returns]);
    }

    public function posteditdetail($id,Request $request){
        
        $returns= returns::find($id);     
        $returns-> notes = $request->notes;
        $returns-> paid = $request->paid;
        $returns->save();
        return redirect('admin/issue/returnlist')->with('warning','Thank you ! You have edited successfully!');
    }

}
