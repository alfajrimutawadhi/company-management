@extends('template')

@section('title', 'Fa Company - Add Crew')
    
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h2>Tambah Data Pegawai</h2>
        <!-- Page Heading -->
        <form action="{{url('/crew')}}" method="post">
            @csrf
            <table>
                <tr>
                    <td>NIP &nbsp;</td>
                    <td>:&nbsp;&nbsp;</td>
                    <td><input type="number" name="nip" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Nama &nbsp;</td>
                    <td>:&nbsp;&nbsp;</td>
                    <td><input type="text" name="nama" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Jabatan &nbsp;</td>
                    <td>:&nbsp;&nbsp;</td>
                    <td>
                        <input type="text" name="jabatan" id="jabatan" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin &nbsp;</td>
                    <td>:&nbsp;&nbsp;</td>
                    <td>
                        <input type="radio" name="jenisKelamin" value="Laki-laki">&nbsp;Laki-Laki&nbsp;&nbsp;
                        <input type="radio" name="jenisKelamin" value="Perempuan">&nbsp;Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Gaji (Rp) &nbsp;</td>
                    <td>:&nbsp;&nbsp;</td>
                    <td><input type="text" name="gaji" class="form-control" id="gaji" required></td>
                </tr>
                <tr>
                    <td>Status Gaji &nbsp;</td>
                    <td>:&nbsp;&nbsp;</td>
                    <td>
                        <select name="statusGaji" id="statusGaji" class="form-control">
                            <option value="sudah">Sudah</option>
                            <option value="belum">Belum</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Tambah" class="btn btn-primary" id="submit">
                    </td>
                </tr>
            </table>                    
        </form>
    </div>
    <!-- /.container-fluid -->

@endsection