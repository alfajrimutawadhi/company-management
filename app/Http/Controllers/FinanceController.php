<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Money;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $money = new Money();
        $money = $money->getKeuangan();
        $session = session('username');
        $finance = Finance::all();
        return view('finance', compact('session', 'finance', 'money'));
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

        $money = new Money();
        $getKeuangan = $money->getKeuangan();
        $finance = new Finance();
        $finance->nominal = $nominal;
        $finance->status = $request->status;
        $finance->keterangan = $request->keterangan;
        if ($request->status == 'masuk') {
            $finance->save();
            $nominalBaru = $getKeuangan->keuangan + $nominal;
            $money->ubahKeuangan($nominalBaru);
            return redirect('/finance')->with('status-finance-success', true);
        } else {
            $nominalBaru = $getKeuangan->keuangan - $nominal;
            if ($nominalBaru > 0) {
                $finance->save();
                $money->ubahKeuangan($nominalBaru);
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
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show(Finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        $data = Finance::where('id', $finance->id)->delete();
        if ($data == true) {
            return back()->with('status-finance-success', true);
        } else {
            return back()->with('status-finance-failed', 'gagal');
        }
    }
}
