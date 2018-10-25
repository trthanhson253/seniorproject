<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cates;
use App\Http\Requests\CateRequest;
use App\subcates;


class CatesController extends Controller
{
    public function getAdd(){
     	return view('admin.cates.addcates'); 	
    }

    public function postAdd(CateRequest $request){
     	$cate = new cates;
     	$cate-> name = $request ->name;
     	$cate-> save();
     	return redirect('admin/cates/add')->with('warning','You added a new category successfully');
    }

     public function getList(){
        $cates=cates::orderBy('id','DESC')->get();
     	return view('admin.cates.listcates',['cates'=>$cates]); 	
    }
    public function getEdit($id){
        $cates= cates::find($id);
        return view('admin.cates.editcates',['cates'=>$cates]);    
    }
    public function postEdit(Request $request,$id){
        $cates= cates::find($id);
        $this->validate($request,[
            'name'=>'required|unique:cates,name|min:1',
        ]);
        $cates->name = $request->name;       
        $cates->save();
        return redirect('admin/cates/list')->with('warning','You edited a category successfully!');    
    }
    public function getDelete($id){
        $subcates=subCates::where('idCates',$id)->count();
        if($subcates==0){
            $cates= cates::find($id);
            $cates->delete();
            return redirect('admin/cates/list')->with('warning','You deleted a category successfully!');
        }else{
            echo "<script type='text/javascript'>alert('Sorry ! You cannot delete this Category');
            window.history.back();
            </script>";
        }
        
    }
}

?>