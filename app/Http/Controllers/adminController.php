<?php

namespace App\Http\Controllers;
use Hash;
use Auth;
use App\models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function adminLogin(){
        return view('admin.login');
    }

    public function adminLogined(Request $request){
        $adminData = array(
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>'admin'
        );
        if(Auth::attempt($adminData )){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->withError('Email and Password is invalid');
        }
        
    }

    public function adminDashboard(){
        return view('admin.dashboard');
    }

    /**
     * 
     * logout
     */

    public function adminLogout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
