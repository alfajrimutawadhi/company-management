<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Finance;
use App\Models\Money;

class PayrollController extends Controller
{
    public function payroll()
    {
        $nip = (int)$_GET['nip'];
        $money = new Money();
        $moneyNow = $money->getKeuangan()->keuangan;
        $crew = new Crew();
        $getPegawai = $crew->getPegawai($nip);
        $gajiPegawai = $crew->getGaji($nip);
        if ($moneyNow - $gajiPegawai > 0) {
            $money->ubahKeuangan($moneyNow-$gajiPegawai);
            $crew = $crew->ubahStatusGaji($nip);
            $finance = new Finance();
            $finance->penggajian($getPegawai);
            return redirect('/payroll')->with('status-gaji', 'berhasil');
        } else {
            return redirect('/payroll')->with('status-gaji', 'gagal');
        }
    }
}
