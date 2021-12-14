<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use HasFactory;

    public function getKeuangan()
    {
        $money = Money::where('id', 1)->first();
        return $money;
    }

    public function ubahKeuangan($request)
    {
        $money = Money::where('id', 1)->update(['keuangan' => $request]);
        return $money;
    }
}
