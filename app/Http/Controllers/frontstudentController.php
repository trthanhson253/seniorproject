<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\subcates;
use App\cates;
use App\books;
use App\comment;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\student;
use App\issue;
use Carbon\Carbon;
use Session,Datetime;
use App\orders;
use App\orderdetails;
use Illuminate\Pagination\Paginator;
use App\returns;
use App\message;
use Illuminate\Support\Facades\Hash;

use Cart;
class frontstudentController extends Controller
{
    function __construct(){
		  $cates= cates::all();
      
    	view()->share('cates',$cates);
     
       
	}
    public function myaccount(){
    	return view('frontstudents.account');
    	
    }
    public function myorder($id){
    	$orders=orders::where('studentid',$id)->orderBy('created_at','DESC')->get();
     	// $ordersid=orders::select('id')->where('studentid',$id)->get();
     	// $orderdetails=orderdetails::whereIn('orderid',$ordersid)->get();      	
    	return view('frontstudents.studentorder',['orders'=>$orders]);   	
    }
    public function myborrowing($id){
        $issue=issue::where('studentid',$id)->orderBy('created_at','DESC')->get();
        $returns= returns::all();
        $now = Carbon::now();        
        return view('frontstudents.borrowingbook',['issue'=>$issue,'now'=>$now,'returns'=>$returns]);    
    }
    public function getmymessage($id){
        $message=message::where('idStudent',$id)->orderBy('created_at','DESC')->get();
        $message1=message::where('idStudent',$id)->where('status',0)->get();
        $count=$message1->count();
        return view('frontstudents.mymessage',['message'=>$message,'count'=>$count]);    
    }
    public function postmymessage($id){
        $message = message::find($id);
        $message->status = 1;
        $message->save();
        return redirect()->back()->with('warning','Message confirmed!');         
    }
     
     public function getEdit($id){	
    	$student= student::find($id);      
      return view('frontstudents.editstudents',['student'=>$student]);   	
    }

    public function postEdit(Request $request,$id){   
        
      $student = student::find($id);
      
      // $student-> student_id = $request ->studentid;
      $student-> email = $request ->email;
      $student-> phone = $request ->phone;
      $student-> address = $request ->address;
      
      if($request->hasFile('image')){
        $file=$request->file('image');
        $format=$file->getClientOriginalExtension();
        if($format!='jpg' && $format!='jpeg' && $format!='png'){
          return redirect('students/edit/'.$id)->with('error','We only accept an image which has format JPG,PNG,JPEG ');
        }
        $name=$file->getClientOriginalName();
        $image=str_random(4)."_".$name;
        while(file_exists("upload/student/".$image)){
          $image=str_random(4)."_".$name;
        }
        $file->move("upload/student",$image);
        // unlink("upload/student/".$student->image);
        $student-> image= $image;
      }
      
      $student-> save();
      return redirect('students/myaccount')->with('warning','You updated your profile successfully! ');
    }
    public function myreturned($id){ 
      $returns=returns::where('studentid',$id)->orderBy('created_at','DESC')->get();     
      $now = Carbon::now();        
      return view('frontstudents.returnedbook',['returns'=>$returns,'now'=>$now]);    
    }
    public function getchangepassword($id){ 
        $student= student::find($id);      
        return view('frontstudents.changepassword',['student'=>$student]); 
    }
    public function postchangepassword($id,Request $request){
      $this->validate($request,[
            'oldpassword' => 'required',
            'password'=>'min:6|max:32',
            'retypepassword'=>'same:password',         
        ]);
      $data = $request->all();
      $student = student::find($id); 

      if(!Hash::check($data['oldpassword'], $student->password)){
          return back()->with('error','Your current password does not match the database password.Please try again!');               
        }else{
          $student-> password = bcrypt($request ->password);
          $student-> save();
          return redirect('students/myaccount')->with('warning','You updated your password successfully! ');
        }
      }
 
}

