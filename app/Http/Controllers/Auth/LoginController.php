<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function handleLogin(Request $request){
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=> 'required'
        ],[
            'email.required'=> 'Email harus diisi',
            'email.email'=> 'Email tidak valid',
            'password.required'=>'Password harus diisi'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        $user = User::where('email',$request->email)->first();
        if(!$user){
            // jika email tidak ada di database
            return back()->withErrors([
                'email'=> 'Email tidak sesuai'
            ])->onlyInput('email');//untuk mempertahankan input email yang telah diisi
        }else{
            return back()->withErrors([
            'password'=>'Password salah'
            ])->onlyInput('email');//untuk mempertahankan input email yang telah diisi
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
