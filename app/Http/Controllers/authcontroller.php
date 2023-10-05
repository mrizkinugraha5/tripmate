<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Hash;
use Session;

class authcontroller extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function register(){
        return view("auth.register");
    }
    public function adminpage(){
        return view("admin.adminpage");
    }
    public function registeruser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res){
            return back()->with('success', 'Data Berhasil Di Simpan');
        } else {
            return back()->with('fail', 'Data Tidak Berhasil Di Simpan');
        }
    }
    public function loginuser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = user::where('email', '=',$request->email)->first();
        if ($user){
            if ($request->email=='admin@admin.com' && Hash::check($request->password, $user->password)){
                $request->Session()->put('LoginId', $user->id);
                return redirect("adminpage");
            }
            if (Hash::check($request->password, $user->password)){
                $request->Session()->put('LoginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password Salah');
            }
        } else {
            return back()->with('fail', 'Email Belum Terdaftar');
        }
    }
    public function dashboard(){
        $data = array();
        if (Session::has('LoginId')){
            $data = user::where('id', '=',Session::get('LoginId'))->first();
        }
        return view('dashboard', compact('data'));
    }
    public function logout(){
        if (Session::has('LoginId')){
            Session::pull('LoginId');
            return redirect('login');
        }
    }
}
