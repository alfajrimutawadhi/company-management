<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;
use PDF;

class CrewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
        }
        
        $session = session('username');
        $crew = Crew::all();
        return view('crew', compact('crew', 'session'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session = session('username');
        return view('add', compact('session'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'jenisKelamin' => 'required',
            'gaji' => 'required',
            'statusGaji' => 'required',
        ]);

        $removeRupiah = preg_replace('/[Rp.]/','',$request->gaji);
        $gaji = (int)str_replace(' ','', $removeRupiah);

        $crew = new Crew();
        $data = $crew->add($request, $gaji);
        if ($data == true) {
            return redirect('/crew')->with('status-add', true);
        } else {
            return redirect('/crew')->with('status-failed', true);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crew  $crew
     * @return \Illuminate\Http\Response
     */
    public function show(Crew $crew)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crew  $crew
     * @return \Illuminate\Http\Response
     */
    public function edit(Crew $crew)
    {
        $session = session('username');
        return view('edit', compact('crew', 'session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crew  $crew
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crew $crew)
    {
        $request->validate([
            "nip" => "required",
            "nama" => "required",
            "jabatan" => "required",
            "gaji" => "required"

        ]);

        $conn = new Crew();
        $data = $conn->edit($request, $crew);
        if ($data == true) {
            return redirect('/crew')->with('status-edit', true);
        } else {
            return redirect('/crew')->with('status-failed', true);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crew  $crew
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crew $crew)
    {
        $data = Crew::where('id', $crew->id)->delete();
        if ($data == true) {
            return back()->with('status-delete', true);
        } else {
            return back()->with('status-failed', true);
        }
    }

    // sudah bisa
    public function print()
    {
        $crew = Crew::all()->sortBy('nip');
        $data = [
            'crew' => $crew
        ];
        $pdf = PDF::loadView('print', $data);
        return $pdf->stream('document.pdf');

    }
}
