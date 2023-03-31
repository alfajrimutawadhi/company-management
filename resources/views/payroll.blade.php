@extends('template')

@section('title', 'Fa Company - Finance')
    
@section('content')

        @if (session('status-gaji') == 'berhasil')
            <script>
                Swal.fire(
                    'Selamat!',
                    'Penggajian berhasil!',
                    'success'
                )
            </script>
        @endif        
        
        @if (session('status-gaji') == 'gagal')
            <script>
                Swal.fire(
                    'Maaf!',
                    'Uang saat ini tidak mencukupi!',
                    'error'
                )
            </script>
        @endif            


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800">Data Pegawai Yang Belum Digaji</h1>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0" class="display">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Gaji</th>
                                        @if (session('username') == 'admin')
                                            <th>&nbsp;</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($crew as $data)
                                        <tr>
                                            <td>{{$data->nip}}</td>
                                            <td>{{$data->nama}}</td>
                                            <td>{{$data->jabatan}}</td>
                                            <td>{{"Rp " . number_format($data->gaji,0,',','.')}}</td>
                                            @if (session('username') == 'admin')
                                                <td>
                                                    <form action="{{url('payroll/?nip='.$data->nip)}}" method="post">
                                                        @csrf
                                                        <input type="submit" name="submit" class="btn btn-success" value="Gaji">
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
                <!-- /.container-fluid -->

@endsection