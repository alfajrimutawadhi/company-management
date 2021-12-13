<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

class Finance extends Model
{
    use HasFactory;

    public function getKeungan()
    {
        $finance = Finance::where('id', 1)->first();
        return $finance;
    }

    public function ubahKeuangan(Request $request)
    {
        # code...
    }
}
