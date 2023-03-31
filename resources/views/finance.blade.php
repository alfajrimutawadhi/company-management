@extends('template')

@section('title', 'Fa Company - Finance')
    
@section('content')

        @if (session('status-finance-success'))
            <script>
                Swal.fire(
                    'Selamat!',
                    'Data keuangan berhasil ditambahkan!',
                    'success'
                )
            </script>
        @endif        
        
        @if (session('status-finance-failed') == 'gagal')
            <script>
                Swal.fire(
                    'Maaf!',
                    'Pengubahan data keuangan gagal!',
                    'error'
                )
            </script>
        @endif        
        
        @if (session('status-finance-failed') == 'kurang')
            <script>
                Swal.fire(
                    'Maaf!',
                    'Keuangan saat ini tidak cukup untuk melakukan pengeluaran!',
                    'error'
                )
            </script>
        @endif        


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800">Keuangan</h1>
                        @if (session('username') == 'admin')
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#financeModal"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data Keuangan</a>
                        @endif
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                        @if (session('username') == 'admin')
                            <a href="{{url('/payroll')}}" class="btn btn-secondary shadow-sm"><i class="fas fa-file-invoice-dollar fa-sm text-white-50"></i>&nbsp; Penggajian</a>
                        @endif
                    </div>

                    <!-- Modal Tambah keuangan -->
                    <div class="modal fade" id="financeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Keuangan</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('/finance')}}" method="POST">
                                        @csrf
                                        <table>
                                            <tr>
                                                <td>Nominal &nbsp;</td>
                                                <td>:&nbsp;&nbsp;</td>
                                                <td><input type="text" name="nominal" class="form-control" id="gaji" required></td>
                                            </tr>
                                            <tr>
                                                <td>Status &nbsp;</td>
                                                <td>:&nbsp;&nbsp;</td>
                                                <td>
                                                    <select name="status" class="form-control">
                                                        <option value="masuk">Masuk</option>
                                                        <option value="keluar">Keluar</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan &nbsp;</td>
                                                <td>:&nbsp;&nbsp;</td>
                                                <td><input type="text" name="keterangan" class="form-control" required></td>
                                            </tr>
                                        </table>  
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Tambah">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            keuangan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="finance">@if (!$money) 0 @endif @if ($money){{$money->keuangan}} @endif</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0" class="display">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Keuangan</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        @if (session('username') == 'admin')
                                            <th>&nbsp;</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finance as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{"Rp " . number_format($data->nominal,0,',','.')}}</td>
                                            <td>{{$data->status}}</td>
                                            <td>{{$data->keterangan}}</td>
                                            <td>{{$data->updated_at}}</td>
                                            @if (session('username') == 'admin')
                                                <td>
                                                    <form action="{{url('finance/'.$data->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
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
                <!-- /.container-fluid -->

@endsection