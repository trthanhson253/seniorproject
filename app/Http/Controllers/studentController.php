<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use App\subcates;
use App\cates;
use App\books;
use App\comment;
use App\User;
use App\issue;
use Carbon\Carbon;
use App\message;
use App\returns;

class studentController extends Controller
{
     public function getList(){
        $student=student::orderBy('id','DESC')->get();
        return view('admin.students.liststudents',['student'=>$student]);     
    }
    public function getAdd(){
        
        return view('admin.students.addstudents');     
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'studentid'=>'required|unique:students,student_id',
            'email'=>'required|unique:students,email',
            'password'=>'required|min:6|max:32',
            'retypepassword'=>'required|same:password',
        ]);
      $student = new student;
      $student-> name = $request ->name;
      $student-> student_id = $request ->studentid;
      $student-> password = bcrypt($request ->password);
      $student-> email = $request ->email;
      $student-> phone = $request ->phone;
      $student-> address = $request ->address;
      $student-> status = $request ->status;
      if($request->hasFile('image')){
        $file=$request->file('image');
        $format=$file->getClientOriginalExtension();
        if($format!='jpg' && $format!='jpeg' && $format!='png'){
          return redirect('admin/students/add')->with('error','We only accept an image which has format JPG,PNG,JPEG ');
        }
        $name=$file->getClientOriginalName();
        $image=str_random(4)."_".$name;
        while(file_exists("upload/student/".$image)){
          $image=str_random(4)."_".$name;
        }
        $file->move("upload/student",$image);
        $student-> image= $image;
      }else{
        $student-> image= "";
      }
      
      $student-> save();
      return redirect('admin/students/add')->with('warning','You added a new student successfully! ');
    }
    public function detail($id){
        $student=student::find($id);
        $issue=issue::where('studentid',$id)->get();
        $returns=returns::where('studentid',$id)->get();
        $now = Carbon::now();
        return view('admin.students.studentdetail',['student'=>$student,'issue'=>$issue,'now'=>$now,'returns'=>$returns]);     
    }
    public function postdetail($id,Request $request){
        $student=student::find($id);
        $student-> status = $request ->status;
        $student-> save();

        return redirect('admin/students/list')->with('warning','You edited student successfully! ');   
    }
     public function getEdit($id){
        $student= student::find($id);
       
        return view('admin.students.editstudents',['student'=>$student]);    
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,[
            
            'password'=>'required|min:6|max:32',
            'retypepassword'=>'required|same:password',
        ]);
      $student = student::find($id);
      $student-> name = $request ->name;
      $student-> student_id = $request ->studentid;
      $student-> password = bcrypt($request ->password);
      $student-> email = $request ->email;
      $student-> phone = $request ->phone;
      $student-> address = $request ->address;
      $student-> status = $request ->status;
      if($request->hasFile('image')){
        $file=$request->file('image');
        $format=$file->getClientOriginalExtension();
        if($format!='jpg' && $format!='jpeg' && $format!='png'){
          return redirect('admin/students/edit/'.$id)->with('error','We only accept an image which has format JPG,PNG,JPEG ');
        }
        $name=$file->getClientOriginalName();
        $image=str_random(4)."_".$name;
        while(file_exists("upload/student/".$image)){
          $image=str_random(4)."_".$name;
        }
        $file->move("upload/student",$image);
        //unlink("upload/student/".$student->image);
        $student-> image= $image;
      }
      // else{
      //   $student-> image= "";
      // }
      
      $student-> save();
      return redirect('admin/students/list')->with('warning','You edited student successfully! ');
    }
    public function getDelete($id){
        $student= student::find($id);
        $student->delete();
        return redirect('admin/students/list')->with('warning','You deleted a student successfully!');
    }
}
