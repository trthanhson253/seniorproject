<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subcates;
use App\cates;
use App\books;
use App\comment;
use App\User;

class userController extends Controller
{
    public function getAdd(){
     		return view('admin.users.adduser'); 
    }
    public function postAdd(Request $request){
    	$this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:32',
            'retypepassword'=>'required|same:password',
        ]);
      $user = new User;
      $user-> name = $request ->name;
      $user-> password = bcrypt($request ->password);
      $user-> email = $request ->email;
      $user-> level = $request ->level;
      if($request->hasFile('image')){
        $file=$request->file('image');
        $format=$file->getClientOriginalExtension();
        if($format!='jpg' && $format!='jpeg' && $format!='png'){
          return redirect('admin/user/add')->with('error','We only accept an image which has format JPG,PNG,JPEG ');
        }
        $name=$file->getClientOriginalName();
        $image=str_random(4)."_".$name;
        while(file_exists("upload/user/".$image)){
          $image=str_random(4)."_".$name;
        }
        $file->move("upload/user",$image);
        $user-> image= $image;
      }else{
        $user-> image= "";
      }
      
      $user-> save();
      return redirect('admin/user/list')->with('warning','You added a new user successfully! ');
    }

    public function getList(){
          $user=User::all();
          return view('admin.users.listuser',['user'=>$user]);
    }

    public function postEdit(Request $request,$id){
       $this->validate($request,[
            'name'=>'required|min:3',
            
            'password'=>'min:6|max:32',
            'retypepassword'=>'same:password',
        ]);
      
      $user= User::find($id);
      $user-> name = $request ->name;
      $user-> password = bcrypt($request ->password);
      $user-> email = $request ->email;
      $user-> level = $request ->level;
       
      if($request->hasFile('image')){
        $file=$request->file('image');
       
        $name=$file->getClientOriginalName();
        $image=str_random(4)."_".$name;
        while(file_exists("upload/user/".$image)){
          $image=str_random(4)."_".$name;
        }
        $file->move("upload/user/",$image);
        //unlink("upload/user/".$user->image);
        $user-> image= $image;
      }else{
        $user-> image= "";
      }
      
      $user-> save();
      return redirect('admin/user/edit/'.$id)->with('warning','You edited successfully! ');
      
    }

    public function getEdit($id){
        $user= User::find($id);
        return view('admin.users.edituser',['user'=>$user]);  
    }

     public function getDelete($id){
        $user= user::find($id);
        $user->delete();
        return redirect('admin/user/list')->with('warning','You deleted a user successfully!');
    }

    
}
