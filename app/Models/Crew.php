<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'nama', 'jabatan', 'jenisKelamin', 'gaji', 'statusGaji'];

    public function getPegawai($nip)
    {
        $data = Crew::where('nip', $nip)->first();
        return $data;
    }

    public function getJumlahPegawai()
    {
        $data = count(Crew::all());
        return $data;
    }

    public function add($request, $gaji)
    {

        $data = Crew::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'jenisKelamin' => $request->jenisKelamin,
            'gaji' => $gaji,
            'statusGaji' => $request->statusGaji,
        ]);
        return $data;
    }

    public function edit($request, $crew)
    {
        $removeRupiah = preg_replace('/[Rp.]/','',$request->gaji);
        $gaji = (int)str_replace(' ','', $removeRupiah);

        $data = Crew::where('id', $crew->id)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'jenisKelamin' => $request->jenisKelamin,
            'gaji' => $gaji,
            'statusGaji' => $request->statusGaji
        ]);
        return $data;
    }

    public function getPegawaiYangBelumDigaji()
    {
        $data = Crew::where('statusGaji', 'belum')->get();
        return $data;
    }

    public function getGaji($nip)
    {
        $data = Crew::where('nip', $nip)->first()->gaji;
        return $data;
    }

    public function ubahStatusGaji($nip)
    {
        $data = Crew::where('nip', $nip)->update([
            'statusGaji' => 'sudah'
        ]);
        return $data;
    }
}
