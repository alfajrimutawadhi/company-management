<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Money;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        $conn = new User();
        $dataUser = $conn->all();
        $cekEmail = true;
        foreach ($dataUser as $key) {
            if ($key->email == $request->email) {
                $cekEmail = false;
            } else {
                continue;
            }
        }
        if ($cekEmail) {
            $conn->firstName = $request->firstName;
            $conn->lastName = $request->lastName;
            $conn->email = $request->email;
            $conn->password = Hash::make($request->password);
            $save = $conn->save();
        } else {
            return redirect('/register')->with('statusDaftar', 'emailSudahTerdaftar');
        }

        if ($save) {
            session([
                "username" => $request->firstName
            ]);
            $crew = new Crew();
            $getJumlahPegawai = $crew->getJumlahPegawai();
            $money = new Money();
            $money = $money->getKeuangan();
             return view('index', ['session' => $request->firstName, 'getJumlahPegawai' => $getJumlahPegawai, 'money' => $money]);
        } else {
            return redirect('/register')->with('statusDaftar', 'gagalMendaftar');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $conn = new User();
        $data = $conn->login($request);
        if ($data != null) {
            if (Hash::check($request->password, $data->password)) {
                session([
                    "username" => $data->firstName
                ]);
                $crew = new Crew();
                $getJumlahPegawai = $crew->getJumlahPegawai();
                $money = new Money();
                $money = $money->getKeuangan();
                return view('index', ['session' => $data->firstName, 'getJumlahPegawai' => $getJumlahPegawai, 'money' => $money]);
            } else {
                return redirect('/login')->with('statusLogin', 'passwordSalah');
            }
        } else {
            return redirect('/login')->with('statusLogin', 'emailTidakDitemukan');
        }
    }


    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
