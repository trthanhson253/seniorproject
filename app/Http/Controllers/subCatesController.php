<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subcates;
use App\cates;
use App\books;

class subCatesController extends Controller
{
     public function getAdd(){
     	$cates = cates::all();
     	return view('admin.subcates.addsubcates',['cates'=>$cates]);	
    }
    public function postAdd(Request $request){
    	$this->validate($request,[
            'name'=>'required|min:1' 
        ]);
     	$subcates = new subCates;
     	$subcates-> name = $request ->name;
     	$subcates->idCates=$request->choosecates;
     	$subcates-> save();
     	return redirect('admin/subcates/add')->with('warning','You added a new subcategory successfully! ');
    }



    public function getList($id){
        // $subcates=subCates::orderBy('id','DESC')->get();
        // return view('admin.subcates.listsubcates',['subcates'=>$subcates]);     

        if ($id!='all') {
            $subcates = subCates::where('idCates',$id)->paginate(1000);
            $cates= cates::all();
            return view('admin.subcates.listsubcates',['subcates'=>$subcates,'cates'=>$cates,'id'=>$id]);                    
        } else {
            $subcates = subcates::paginate(1000);
            $cates= cates::all();
            return view('admin.subcates.listsubcates',['subcates'=>$subcates,'cates'=>$cates,'id'=>$id]);    
        }       
    }


    public function postEdit(Request $request,$id){
       
        $this->validate($request,[
            'name'=>'required|min:1'
        ]);
        $subcates= subCates::find($id);
        $subcates->name = $request->name;
        $subcates->idCates=$request->choosecates;       
        $subcates->save();
        return redirect('admin/subcates/list/all')->with('warning','You edited a subcategory successfully!');    
    }
    public function getEdit($id){
        $cates= cates::all();
        $subcates= subCates::find($id);
        return view('admin.subcates.editsubcates',['subcates'=>$subcates,'cates'=>$cates]);    
    }
    
    // public function getDelete($id){
    //     $subcates= subCates::find($id);
    //     $subcates->delete();
    //     return redirect('admin/subcates/list')->with('warning','You deleted a subcategory successfully!');
    // }

    public function getDelete($id){
        $books=books::where('idsubCates',$id)->count();
        if($books==0){
            $subCates= subCates::find($id);
            $subCates->delete();
            return redirect('admin/subcates/list/all')->with('warning','You deleted a subcategory successfully!');
        }else{
            echo "<script type='text/javascript'>alert('Sorry ! You cannot delete this SubCategory');
            window.history.back();
            </script>";
        }
        
    }
}
