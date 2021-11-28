<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = session('username');
        $crew = Crew::all();
        return view('crew', ['session' => $session, 'crew' => $crew]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if ($data) {
            return redirect('/crew')->with('status-edit', true);
        } else {
            return "Data gagal diubah";
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
        return back()->with('status-delete', $data);
    }
}
