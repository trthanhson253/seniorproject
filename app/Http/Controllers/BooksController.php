<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subcates;
use App\cates;
use App\books;
use App\comment;

class BooksController extends Controller
{
    public function getAdd(){
     	$cates = cates::all();
     	$subcates= subcates::all();
     	return view('admin.books.addbooks',['cates'=>$cates,'subcates'=>$subcates]);	
    }
    public function postAdd(Request $request){
    	$this->validate($request,[
            'title'=>'required|min:1',
	    	'isbn'=>'required|unique:books,isbn|min:10',
	    	'price'=>'required|numeric',    	
	    	'quantity'=>'required|numeric',
            
        ]);
        $books = new books;
     	$books-> title= $request ->title;
     	$books-> author = $request ->author;
     	$books-> publisher = $request ->publisher;
     	$books-> price = $request ->price;
     	$books-> isbn = $request ->isbn;
     	$books-> description = $request ->description;     	
     	$books-> quantity= $request ->quantity;
        $books-> available= $request ->available;
        $books-> shelf= $request ->shelf;
     	$books-> status= $request ->status;
     	if($request->hasFile('image')){
     		$file=$request->file('image');
     		$format=$file->getClientOriginalExtension();
     		if($format!='jpg' && $format!='jpeg' && $format!='png'  ){
     			return redirect('admin/books/add')->with('error','We only accept an image which has format JPG,PNG,JPEG ');
     		}
     		$name=$file->getClientOriginalName();
     		$image=str_random(4)."_".$name;
     		while(file_exists("upload/image/".$image)){
     			$image=str_random(4)."_".$name;
     		}
     		$file->move("upload/image",$image);
     		$books-> image= $image;
     	}else{
     		$books-> image= "";
     	}
     	$books->idsubCates=$request->choosesubcates;
        $books->idUsers=1;
     	$books->save();
     	return redirect('admin/books/add')->with('warning','You added successfully! ');
    	
    }


    public function postEdit(Request $request,$id){
       
       $this->validate($request,[
            'title'=>'required|min:1',
            'isbn'=>'required|min:10',
            'price'=>'required|numeric',        
            'quantity'=>'required|numeric',
            'image'=>'image',
        ]);
        $books= books::find($id);
        $books-> title= $request ->title;
        $books-> author = $request ->author;
        $books-> publisher = $request ->publisher;
        $books-> price = $request ->price;
        $books-> isbn = $request ->isbn;
        $books-> description = $request ->description;      
        $books-> quantity= $request ->quantity;
        $books-> shelf= $request ->shelf;
        $books-> status= $request ->status;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $format=$file->getClientOriginalExtension();
            if($format!='jpg' && $format!='jpeg' && $format!='png'  ){
                return redirect('admin/books/edit/$id')->with('error','We only accept an image which has format JPG,PNG,JPEG ');
            }
            $name=$file->getClientOriginalName();
            $image=str_random(4)."_".$name;
            while(file_exists("upload/image/".$image)){
                $image=str_random(4)."_".$name;
            }
            $file->move("upload/image",$image);
            unlink("upload/image/".$books->image);
            $books-> image= $image;
        }
        $books->idsubCates=$request->choosesubcates;
        $books->idUsers=1;
        $books->save();
        return redirect('admin/books/list/all')->with('warning','You edited a book successfully! ');
    }

    public function getEdit($id){
        $books= books::find($id);
        $cates = cates::all();
        $subcates= subcates::all();
        return view('admin.books.editbooks',['books'=>$books,'cates'=>$cates,'subcates'=>$subcates]);    
    }

     public function getDelete($id){
        $books= books::find($id);
        $books->delete();
        return redirect('admin/books/list/all')->with('warning','You deleted a book successfully!');
    }
    public function managebooks(){
        $books=books::orderBy('id','ASC')->get();
        return view('admin.books.managebooks',['books'=>$books]);     
    }
    public function getList($id){
        // $cates = cates::all();
        // $subcates= subcates::all();
        // $books=books::orderBy('id','ASC')->get();
        // return view('admin.books.listbooks',['books'=>$books,'cates'=>$cates,'subcates'=>$subcates]);     
    
    if ($id!='all') {

            $books = books::where('idsubCates',$id)->paginate(10000);
            $subcates = subcates::all();
            $cates= cates::all();
            return view('admin.books.listbooks',['books'=>$books,'cates'=>$cates,'subcates'=>$subcates,'id'=>$id]);                    
    }
        else {
            $books = books::paginate(10000);
            $subcates = subcates::all();
            $cates= cates::all();
            return view('admin.books.listbooks',['books'=>$books,'cates'=>$cates,'subcates'=>$subcates,'id'=>$id]);
        } 
    }      
    
}
