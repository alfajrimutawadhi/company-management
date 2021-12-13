<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pegawai</title>
    <link rel="icon" href="{{asset('/img/logo-comp.png')}}">

</head>
<body>
    <h1 style="text-align: center">Daftar Pegawai di Fa Company</h1>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" class="display" border="1">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Jenis Kelamin</th>
                <th>Gaji</th>
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>