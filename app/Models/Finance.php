<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    

    public function getKeuangan()
    {
        $finance = Finance::where('id', 1)->first();
        return $finance;
    }

    public function ubahKeuangan($request)
    {
        $finance = Finance::where('id', 1)->update(['keuangan' => $request]);
        return $finance;
    }
}
