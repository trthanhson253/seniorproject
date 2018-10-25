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
use Mail;


use Cart;

class pageController extends Controller
{
	function __construct(){
		  $cates= cates::all();
      $students=student::where('id',16)->get();
    	view()->share('cates',$cates);
      view()->share('students',$students);
       
	}
   
    public function cates($id){
      $ct=cates::find($id);
      $subcates=subcates::where('idCates',$id)->get();
      $idsucates=subcates::select('id')->where('idCates',$id)->get();
      $books=books::whereIn('idsubCates',$idsucates)->get();
      
      return view('front.cates',['subcates'=>$subcates,'ct'=>$ct,'books'=>$books]);
    }
    public function subcates($id){
    	$sc=subCates::all();
    	$subcates=subCates::find($id);

    	$books=books::where('idsubCates',$id)->paginate(9);
    	
    	return view('front.subcates',['subcates'=>$subcates,'books'=>$books,'sc'=>$sc]);
    }
    public function books($id){
       //$students=student::where('id',10)->get();

       $books=books::find($id);
       $comment=comment::where('idBooks',$id)->orderBy('created_at','DESC')->get();
       $relates=books::where('idsubCates',$books->idsubCates)->take(10)->get();
       return view('front.books',['books'=>$books,'relates'=>$relates,'comment'=>$comment]);

    }
    public function getLogin(){
      return view('front.login');

    }
    // public function postLogin(Request $request){
    //     $this->validate($request,[
    //         'name'=>'required|min:1',
    //         'password'=>'required|min:6|max:32',
    //     ]);
    //     if(Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
    //     return redirect('/');
    //     }else{
    //         return redirect('login')->with('warning','Failed!');
    //     }
    // }
     public function postLogin(Request $request){
        $this->validate($request,[
            'name'=>'required|min:1',
            'password'=>'required|min:6|max:32',

            
        ]);
        $loginStudent=['name' => $request->name, 'password' => $request->password];
        $token = $request->input('g-recaptcha-response');
        if ($token && Auth::guard('students')->attempt($loginStudent)){
            return redirect('/');
        }else{
             return redirect('login')->with('warning','Something wrong happen with your login. Please check again !');
        }    
        // if (Auth::guard('students')->attempt($loginStudent)){
        //     return redirect('/');
        // }else{
        //      return redirect('login')->with('warning','Your username or password is not correct.');
        // }    
       
    }
    public function getLogout(){
        Auth::guard('students')->logout();
         return redirect()->back();
    }

     public function getUser(){
        $user=Auth::guard('students')->user();
        return view('pages.user',['user'=>$user]);
    }
     public function postUser(Request $request){
        $this->validate($request,[
            'email'=>'required|min:1',
            'password'=>'required|min:6|max:32',
            'repassword'=>'required|same:password',
        ]);
        
        $user= Auth::guard('students')->user();
        $user->email = $request->email;
        $user->password=bcrypt($request->password); 
        $user->save();
        return redirect('user')->with('warning','You edited successfully!');
    }
     public function getSignup(){
        
        return view('front.signup');
    }
     public function postSignup(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'studentid'=>'required|unique:students,student_id',
            'password'=>'required|min:6|max:32',
            'retypepassword'=>'required|same:password'
        ]);
      $student = new student;
      $student-> name = $request ->name;
      $student-> email = $request ->email;
      $student-> student_id = $request ->studentid;
      $student-> phone = $request ->phone;
      $student-> address = $request ->address;
      $student-> password = bcrypt($request ->password); 
      $student-> status = 0; 
      $token = $request->input('g-recaptcha-response');    
      $student-> save();
      if ($token){
          return redirect('login')->with('error','You registered successfully! Please log in');
      }else{
          return redirect('signup')->with('warning','Please type the captcha to complete your registration');
      }
      
    }
    public function search(Request $request){
        $key= $request->search;
        $bks= books::where('title','like',"%$key%")->orWhere('author','like',"%$key%")->orWhere('publisher','like',"%$key%")->orWhere('isbn','like',"%$key%")->orWhere('description','like',"%$key%")->take(1000);
        $books=$bks->paginate(50);
        $count=$bks->count();
        return view('front.search',['books'=>$books,'key'=>$key,'count'=>$count]);
    }
     
     public function borrowlist($id){
        $user= Auth::guard('students')->user();
        $issue=issue::where('studentid',$id)->get();
        $now = Carbon::now();       
        return view('pages.borrowlist',['issue'=>$issue,'now'=>$now,'user'=>$user]);

    }
    // public function addtocart(Request $req,$id){
    //     $books=books::find($id);
    //     $oldCart=Session('cart')?Session::get('cart'):null;
    //     $cart=new Cart($oldCart);
    //     $cart->add($books,$id);
    //     $req->session()->put('cart',$cart);
    //     return redirect()->back();
    // }

    // public function delcart($id){
    //     $oldCart=Session::has('cart')?Session::get('cart'):null;
    //     $cart=new Cart($oldCart);
    //     $cart->removeItem($id);
    //     if(count($cart->items)>0){
    //         Session::put('cart',$cart);
    //     }else{
    //         Session::forget('cart');
    //     }       
    //     return redirect()->back();
    // }

    public function addtocart($id){
       $books = books::where('id',$id)->first();
       Cart::add(['id' => $books->id, 'name' => $books->title,'qty' => 1, 'price' => $books->price,'options' => ['img' => $books->image,'isbn' => $books->isbn,'publisher' => $books->publisher]]);

        return redirect()->back();
    }
     public function delcart($id){
       Cart::remove($id);
       return redirect()->back();
    } 
    public function orderdetail(){
      return view('front.orderdetail');
    }
     public function confirm(){
      return view('front.confirm');
    }
    public function getcheckout(){
      if (Auth::guard('students')->check()) {
        return view ('front.checkout');           
      } else {
          return redirect('login');             
        }        
    }
    public function postcheckout(Request $req){
        $orders = new orders();
        // $total =0;
        // foreach (Cart::content() as $row) {
        //     $total = $total + ( $row->qty * $row->price);
        // }
        $orders->studentid = Auth::guard('students')->user()->id;
        $orders->quantity = Cart::count();
        $orders->total = 0;
        // $orders->total = floatval($total);
       
       
        $orders->status = 0;
        
        $orders->created_at = new datetime;
        $orders->save();
        $orderid =$orders->id;

        foreach (Cart::content() as $row) {
           $detail = new orderdetails();
           $detail->bookid = $row->id;
           $detail->quantity = $row->qty;
           $detail->orderid = $orderid;
           $detail->created_at = new datetime;
           $detail->save();
        }
        Cart::destroy();   
        return redirect('/confirm');       
    }
    public function index(){
      
      $popularbooks = books::where('status',1)->get();
      $newestbooks = books::orderBy('created_at','DESC')->get();
      return view('front.index',['popularbooks'=>$popularbooks,'newestbooks'=>$newestbooks]);     
    }
    public function getemailus(){     
      return view('front.emailus');     
    }
    public function postemailus(Request $request){
      
       $data = [
          'name'=> $request->name,
          'studentid'=> $request->studentid,
          'email'=> $request->email,
          'subject'=> $request->subject,
          'content'=> $request->content
         
       ];
      Mail::send('front.email.blanks',$data,function($message) use ($data){
        $message->from($data['email']);
        $message->to('dinhtran9856@gmail.com');
        $message->subject($data['subject']);
      });

      return redirect('emailus')->with('warning','Your email has been sent successfully! Please wait for responding from librarian within 24 hours,except weekends');
       
    }
    
}
