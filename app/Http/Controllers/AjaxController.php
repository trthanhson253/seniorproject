<?php

namespace App\Http\Controllers;
use App\subcates;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getSubcates($idcates){
     	$subcates = subCates::where('idcates',$idcates)->get();
     	foreach($subcates as $sct){

     		echo "<option value='".$sct->id."'>".$sct->name."</option>";

     	}
     	
    }
     public function getSubcates1($idcates){
     	$subcates = subCates::where('idcates',$idcates)->get();
     	echo "<option>Choose a subcategory</option>";
     	
     	foreach($subcates as $sct){


     		echo "<option value='admin/books/list/".$sct->id."'>".$sct->name."</option>";

     	}
     	
    }
}
?>