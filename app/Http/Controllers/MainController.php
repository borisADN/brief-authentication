<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');

        }
        return view('login');
    }
    public function index()
    {
     if(!Auth::check()){
          return redirect()->route('login');

         }
        return view('dashboard');
    }
    public function index2()
    {
     if(!Auth::check()){
          return redirect()->route('login');
         }
        return view('dashboard');
    }
}
