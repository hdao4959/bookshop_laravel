<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('Login');
    }

    public function postLogin(Request $request){
        $data = $request->only(['email', 'password']);
        if(Auth::attempt($data)){
            session()->regenerate();
            return redirect()->route('admin.home');
        }else{
            return redirect()->back()->with("fail", "Tài khoản hoặc mật khẩu không chính xác");
        }
    }
    public function logout(){
        Auth::logout();
        session()->invalidate();
        return redirect()->route('login');
    }
    public function register(){
        return view('Register');
    }
    public function postRegister(Request  $request){
        $data = $request->all();
        User::create($data);
        return redirect()->route('login')->with('message', 'Đăng ký tài khoản thành công');
    }
}
