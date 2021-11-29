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
                                    <select name="jabatan" class="form-control" required>
                                        <option value="Owner">Owner</option>
                                        <option value="Secretary">Secretary</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Software Engineer">Software Engineer</option>
                                        <option value="Office Manager">Office Manager</option>
                                        <option value="Data Coordinator">Data Coordinator</option>
                                        <option value="Systems Administrator">Systems Administrator</option>
                                        <option value="Marketing Designer">Marketing Designer</option>
                                        <option value="Javascript Developer">Javascript Developer</option>
                                        <option value="Accountant">Accountant</option>
                                    </select>
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
                                <td>
                                    <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
                                </td>
                            </tr>
                        </table>                    
                    </form>
                </div>
                <!-- /.container-fluid -->

@endsection