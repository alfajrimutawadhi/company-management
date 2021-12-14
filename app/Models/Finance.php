<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = ['nominal', 'status', 'keterangan'];

    public function penggajian($crew)
    {
        $finance = Finance::create([
            'nominal' => $crew->gaji,
            'status' => 'keluar',
            'keterangan' => 'Gaji untuk '.$crew->nama,
        ]);
        return $finance;
    }
}
