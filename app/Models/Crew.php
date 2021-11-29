<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'nama', 'jabatan', 'jenisKelamin', 'gaji'];

    public function edit($request, $crew)
    {
        $data = Crew::where('id', $crew->id)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'jenisKelamin' => $request->jenisKelamin,
            'gaji' => $request->gaji,
        ]);
        return $data;
    }
}
