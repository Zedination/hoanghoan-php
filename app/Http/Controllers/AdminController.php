<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function loginAdmin(){
        if(auth()->check()){
            return redirect()->to('home');
        }
        return view('Admin.login');
    }
    public function postLoginAdmin(Request $request){
        $remember = $request->has('remember_me') ? true : false;
        if(auth()->attempt([
            'email' => $request->email,
            'password'=>$request->password
        ],$remember)){
            $user=auth()->user();
            Session::put('user_name',$user->name);
            return redirect()->to('/home');
        }
        Session::put('message','Tài khoản hoặc mật khẩu chưa đúng');
        return redirect()->route('adminLogin');
    }
    public function logoutAdmin(){
        auth()->logout();
        Session::flush();
        return redirect()->route('adminLogin');
    }
}
