<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Financialrecord;
use Illuminate\Http\Request;

class FinancialrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finance = new Finance();
        $finance = $finance->getKeuangan();
        $session = session('username');
        $financialRecord = Financialrecord::all();
        return view('finance', compact('session', 'finance', 'financialRecord'));
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
        $request->validate([
            'nominal' => 'required',
            'status' => 'required',
            'keterangan' => 'required'
        ]);

        $removeRupiah = preg_replace('/[Rp.]/','',$request->nominal);
        $nominal = (int)str_replace(' ','', $removeRupiah);

        $finance = new Finance();
        $getKeuangan = $finance->getKeuangan();
        $financialRecord = new Financialrecord();
        $financialRecord->nominal = $nominal;
        $financialRecord->status = $request->status;
        $financialRecord->keterangan = $request->keterangan;
        if ($request->status == 'masuk') {
            $financialRecord->save();
            $nominalBaru = $getKeuangan->keuangan + $nominal;
            $finance->ubahKeuangan($nominalBaru);
            return redirect('/finance')->with('status-finance-success', true);
        } else {
            $nominalBaru = $getKeuangan->keuangan - $nominal;
            if ($nominalBaru > 0) {
                $financialRecord->save();
                $finance->ubahKeuangan($nominalBaru);
                return redirect('/finance')->with('status-finance-success', true);
            } else {
                return redirect('/finance')->with('status-finance-failed', 'kurang');
            }
        }
        return redirect('/finance')->with('status-finance-failed', 'gagal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Financialrecord  $financialrecord
     * @return \Illuminate\Http\Response
     */
    public function show(Financialrecord $financialrecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Financialrecord  $financialrecord
     * @return \Illuminate\Http\Response
     */
    public function edit(Financialrecord $financialrecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Financialrecord  $financialrecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Financialrecord $financialrecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Financialrecord  $financialrecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Financialrecord $financialrecord)
    {
        // MODEL BELUM TERKONEKSI KE DATABASE
        dd($financialrecord);
        $data = FinancialRecord::where('id', $financialrecord->id)->delete();
        if ($data == true) {
            return back()->with('status-finance-success', true);
        } else {
            return back()->with('status-finance-failed', 'gagal');
        }
    }
}
