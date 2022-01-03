<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Money;

class PagesController extends Controller
{
    public function index()
    {
        $session = session('username');
        $crew = new Crew();
        $getJumlahPegawai = $crew->getJumlahPegawai();
        $money = new Money();
        $money = $money->getKeuangan();
        return view('index', compact('session', 'getJumlahPegawai', 'money'));
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

    public function payroll()
    {
        $session = session('username');
        $crew = new Crew();
        $crew = $crew->getPegawaiYangBelumDigaji();
        return view('payroll', compact('session', 'crew'));
    }

    public function project()
    {
        $session = session('username');
        return view('project', compact('session'));
    }
}
