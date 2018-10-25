<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function getLoginAdmin(){
    	return view('admin.login.login');
    }
    public function postLoginAdmin(LoginRequest $req){
    	$loginAdmin=['name' => $req->name, 'password' => $req->password];
        
    	if (Auth::attempt($loginAdmin)) {           
            return redirect('admin/dashboard');
        }else{
        	return redirect('admin/login')->with('warning','Login failed! The username or password is not correct');
        }
    }

    public function getLogoutAdmin(){
        Auth::logout();
        return view('admin.login.login');
    }
}
