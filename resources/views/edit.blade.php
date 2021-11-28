@extends('template')

@section('title', 'Blank')
    
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
                                <td><input type="text" name="nip" class="form-control" value="{{$crew->nip}}" required></td>
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
                                    <select name="jabatan" class="form-control" required>
                                        <option value="Owner" @if ($crew->jabatan == 'Owner') selected @endif>Owner</option>
                                        <option value="Secretary" @if ($crew->jabatan == 'Secretary') selected @endif>Secretary</option>
                                        <option value="Staff" @if ($crew->jabatan == 'Staff') selected @endif>Staff</option>
                                        <option value="Software Engineer" @if ($crew->jabatan == 'Software Engineer') selected @endif>Software Engineer</option>
                                        <option value="Office Manager" @if ($crew->jabatan == 'Office Manager') selected @endif>Office Manager</option>
                                        <option value="Data Coordinator" @if ($crew->jabatan == 'Data Coordinator') selected @endif>Data Coordinator</option>
                                        <option value="Systems Administrator" @if ($crew->jabatan == 'Systems Administrator') selected @endif>Systems Administrator</option>
                                        <option value="Marketing Designer" @if ($crew->jabatan == 'Marketing Designer') selected @endif>Marketing Designer</option>
                                        <option value="Javascript Developer" @if ($crew->jabatan == 'Javascript Developer') selected @endif>Javascript Developer</option>
                                        <option value="Accountant" @if ($crew->jabatan == 'Accountant') selected @endif>Accountant</option>
                                    </select>
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
                                <td><input type="text" name="gaji" class="form-control" value="{{$crew->gaji}}" required></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" value="Ubah" class="btn btn-primary">
                                </td>
                            </tr>
                        </table>                    
                    </form>
                </div>
                <!-- /.container-fluid -->

@endsection