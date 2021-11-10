<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function home(){
        // return "hello controller - index";
        return view("homepage");
    }
    
    public function userHome(){
        if(session()->has('email')){
            return view("userHomePage");
        }else{
            return redirect("/login");
        }
        
    }
    
    public function login(){
        return view("login");
    }

    public function info(){
        return view("info");
    }
    
    public function admin(){
        if(session()->has('email')){
            return view("adminHomePage");
        }else{
            return redirect("/login");
        }
    }
}