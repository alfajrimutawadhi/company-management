<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $session = session('username');
        $crew = new Crew();
        $getPegawai = $crew->getPegawai();
        return view('index', compact('session', 'getPegawai'));
    }

    public function buttons()
    {
        $session = session('username');
        return view('buttons', compact('session'));
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
