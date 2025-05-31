<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('backend.login');
    }
    public function postlogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:3',
        ]);

        $data=$request->only('email','password');
        if (Auth::attempt($data)) {
            $user = Auth::user();
            return redirect()->route('admin.products.index')->with('success', 'Selamat datang, ' . $user->name);
        }
        else{
            return back()->with('pesan', 'Email atau password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Anda telah berhasil logout');
    }
}
