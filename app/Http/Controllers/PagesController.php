<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $session = session('username');
        return view('index', ['session' => $session]);
    }

    public function buttons()
    {
        return view('buttons');
    }
    
    public function login()
    {
        return view('login');
    }
    
    public function register()
    {
        return view('register');
    }
}
