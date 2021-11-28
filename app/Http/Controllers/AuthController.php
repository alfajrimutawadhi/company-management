<?php

namespace App\Http\Controllers;

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
        $conn->firstName = $request->firstName;
        $conn->lastName = $request->lastName;
        $conn->email = $request->email;
        $conn->password = Hash::make($request->password);
        $save = $conn->save();

        if ($save) {
            session([
                "username" => $request->firstName
            ]);
             return view('index', ['session' => $request->firstName]);
        } else {
            return "Tidak dapat mendaftar";
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
            if ($request->email == $data->email) {
                if (Hash::check($request->password, $data->password)) {
                    session([
                        "username" => $data->firstName
                    ]);
                    return view('index', ['session' => $data->firstName]);
                } else {
                    return "Password salah!";
                }
            } else {
                return "Email tidak ditemukan";
            }
        } else {
            return "Email tidak ditemukan";
        }
    }


    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
