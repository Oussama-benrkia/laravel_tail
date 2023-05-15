<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    //
    public function create(){
        
        return view("users.register");
    }
    public function store(Request $request){
        //dd($request);
        $vali=$request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:6'
        ]);
        //Hash password
        $vali["password"]=Hash::make($vali["password"]);

        //create user
        $user=User::create($vali);

        Auth::login($user);

        return redirect('/')->with(["message"=>"user is created"]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }
    public function show(){
        return view("users.login");
    }
    public function login(Request $request){
        $vali=$request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        
        if(Auth::attempt($vali)){
            $request->session()->regenerate();
            return redirect("/");
        }
            return back()->withErrors(["login"=>"email or password incorrect"]);
        
    }
}
