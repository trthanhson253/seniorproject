<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function dashboard(){
        
     	return view('admin.dashboard'); 	
    }
    public function aboutus(){
        
     	return view('admin.aboutus'); 	
    }
}
