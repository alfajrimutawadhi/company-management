@extends('template')

@section('title', 'Edit Pegawai')
    
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h2>Ubah Data Pegawai</h2>
                    <!-- Page Heading -->
                    <form action="{{url('crew/'.$crew->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <table>
                            <tr>
                                <td>NIP &nbsp;</td>
                                <td>:&nbsp;&nbsp;</td>
                                <td><input type="number" name="nip" class="form-control" value="{{$crew->nip}}" required></td>
                            </tr>
                            <tr>
                                <td>Nama &nbsp;</td>
                                <td>:&nbsp;&nbsp;</td>
                                <td><input type="text" name="nama" class="form-control" value="{{$crew->nama}}" required></td>
                            </tr>
                            <tr>
                                <td>Jabatan &nbsp;</td>
                                <td>:&nbsp;&nbsp;</td>
                                <td>
                                    <input type="text" name="jabatan" id="jabatan" class="form-control" required value="{{$crew->jabatan}}">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin &nbsp;</td>
                                <td>:&nbsp;&nbsp;</td>
                                <td>
                                    <input type="radio" name="jenisKelamin" value="Laki-laki" @if ($crew->jenisKelamin == 'Laki-laki') checked @endif>&nbsp;Laki-Laki&nbsp;&nbsp;
                                    <input type="radio" name="jenisKelamin" value="Perempuan" @if ($crew->jenisKelamin == 'Perempuan') checked @endif>&nbsp;Perempuan
                                </td>
                            </tr>
                            <tr>
                                <td>Gaji (Rp) &nbsp;</td>
                                <td>:&nbsp;&nbsp;</td>
                                <td><input type="text" name="gaji" class="form-control" value="{{"Rp " . number_format($crew->gaji,0,',','.')}}" id="gaji" required></td>
                            </tr>
                            <tr>
                                <td>Status Gaji &nbsp;</td>
                                <td>:&nbsp;&nbsp;</td>
                                <td>
                                    <select name="statusGaji" id="statusGaji" class="form-control">
                                        <option value="sudah" @if ($crew->statusGaji == 'sudah') selected @endif>Sudah</option>
                                        <option value="belum" @if ($crew->statusGaji == 'belum') selected @endif>Belum</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" value="Ubah" class="btn btn-primary" id="submit">
                                </td>
                            </tr>
                        </table>                    
                    </form>
                </div>
                <!-- /.container-fluid -->

@endsection