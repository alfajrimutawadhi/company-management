@extends('template')

@section('title', 'Fa Company - Crew')
    
@section('content')

    @if (session('status-add'))
        <script>
            Swal.fire(
                'Selamat!',
                'Data pegawai berhasil ditambah',
                'success'
            )
        </script>
    @endif

    @if (session('status-edit'))
        <script>
            Swal.fire(
                'Selamat!',
                'Data pegawai berhasil diubah',
                'success'
            )
        </script>
    @endif
    
    @if (session('status-delete'))
        <script>
            Swal.fire(
                'Selamat!',
                'Data pegawai berhasil dihapus',
                'success'
            )
        </script>
    @endif
    
    @if (session('status-failed'))
        <script>
            Swal.fire(
                'Peringatan!',
                'Proses gagal',
                'error'
            )
        </script>
    @endif
    
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary align-middle mt-2" style="float: left;">Daftar pegawai</h6>
                <div class="tambah-pegawai" style="float: right">
                    <a href="{{url('crew/print')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" target="_blank">Cetak</a>
                        @if (session('username') == 'admin')
                            <a href="{{url('crew/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>&nbsp;&nbsp;Tambah pegawai</a>
                        @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" class="display">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Jenis Kelamin</th>
                                <th>Gaji</th>
                                @if (session('username') == 'admin')
                                    <th>&nbsp;</th>
                                    
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
                                    <td>
                                        {{"Rp " . number_format($crew->gaji,0,',','.')}}
                                        @if ($crew->statusGaji == 'sudah')
                                            <div class="btn btn-success btn-sm">
                                                sudah
                                            </div>
                                        @endif
                                        @if ($crew->statusGaji == 'belum')
                                            <div class="btn btn-danger btn-sm">
                                                belum
                                            </div>
                                        @endif
                                    </td>
                                    @if (session('username') == 'admin')
                                        <td>
                                            <form action="{{url('crew/'.$crew->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{url('crew/'.$crew->id.'/edit')}}" class="btn btn-warning">Edit</a>
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