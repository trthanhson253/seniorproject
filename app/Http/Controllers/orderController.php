<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orders;
use App\orderdetails;
use DB;
use App\books;


class orderController extends Controller
{

	 public function getList(){
         $orders=orders::orderBy('id','DESC')->get();
            
     	 return view('admin.order.listorder',['orders'=>$orders]);	
    }
    public function getDetail($id){
        $orderdetails=orderdetails::where('orderid',$id)->get();                 	 
     	$orders = orders::where('id',$id)->first();   
    	return view('admin.order.orderdetails',['orders'=>$orders,'orderdetails'=>$orderdetails]);	
    }
    public function postDetail($id){
        $orders = orders::find($id);
    	$orders->status = 1;
    	$orders->save();
    	return redirect('admin/order/list')->with('warning','Request confirmed!');   
    }
    public function getDelete($id){
         $status=orders::where('id',$id)->pluck('status');
         
        if($status[0]==0){
            $orders= orders::find($id);           
            $orders->delete();           
            return redirect('admin/order/list')->with('warning','You canceled this request successfully!');
        }else{
            echo "<script type='text/javascript'>alert('Sorry ! You cannot cancel this request because it is already completed');
            window.history.back();
            </script>";
        }
        
    
    }
    public function pendingorder(){
         $orders=orders::where('status',0)->orderBy('id','ASC')->get();
            
         return view('admin.order.pendingorder',['orders'=>$orders]);  
    }
    public function completedorder(){
         $orders=orders::where('status',1)->orderBy('id','ASC')->get();
            
         return view('admin.order.completedorder',['orders'=>$orders]);  
    }
    
}
