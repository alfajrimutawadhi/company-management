<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Finance;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $session = session('username');
        $crew = new Crew();
        $getPegawai = $crew->getPegawai();
        $finance = new Finance();
        $finance = $finance->getKeuangan();
        return view('index', compact('session', 'getPegawai', 'finance'));
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
