@extends('template')

@section('title', 'Fa Company - Crew')
    
@section('content')

                @if (session('status-edit'))
                    <script>
                        Swal.fire(
                            'Selamat!',
                            'Data berhasil diubah',
                            'success'
                        )
                    </script>
                @endif
                
                @if (session('status-delete'))
                    <script>
                        Swal.fire(
                            'Selamat!',
                            'Data berhasil dihapus',
                            'success'
                        )
                    </script>
                @endif
                
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Crews list</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary align-middle mt-2" style="float: left;">Data</h6>
                            @if (session('username') == 'admin')
                                <div class="tambah-pegawai" style="float: right">
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                        class="fas fa-download fa-sm text-white-50"></i>&nbsp;&nbsp;add crew</a>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Gaji</th>
                                            @if (session('username') == 'admin')
                                                <th>Keterangan</th>
                                                
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($crew as $crew)
                                            <tr>
                                                <td>{{$crew->nip}}</td>
                                                <td>{{$crew->nama}}</td>
                                                <td>{{$crew->jabatan}}</td>
                                                <td>{{$crew->jenisKelamin}}</td>
                                                <td>Rp{{$crew->gaji}}</td>
                                                @if (session('username') == 'admin')
                                                    <td>
                                                        <form action="{{url('crew/'.$crew->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="{{url('crew/'.$crew->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                                            <input type="submit" name="submit" class="btn btn-danger" value="Delete">
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endsection