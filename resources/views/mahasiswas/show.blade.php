<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/posts/'.$mahasiswa->image) }}" class="w-100 rounded">
                        <div class="mt-3">
                            <h5>Data Mahasiswa:</h5>
                            <ul>
                                <li><strong>ID:</strong> {{ $mahasiswa->id }}</li>
                                <li><strong>Universitas:</strong> {{ $mahasiswa->universitas->nama }}</li>
                                <li><strong>Nama:</strong> {{ $mahasiswa->nama }}</li>
                                <li><strong>NIM:</strong> {{ $mahasiswa->nim }}</li>
                                <li><strong>No. Telepon:</strong> {{ $mahasiswa->no_telp }}</li>
                                <li><strong>Umur:</strong> {{ $mahasiswa->umur }}</li>
                                <li><strong>Alamat:</strong> {{ $mahasiswa->alamat }}</li>
                                <li><strong>Tanggal Lahir:</strong> {{ $mahasiswa->tanggal_lahir }}</li>
                                <li><strong>Jenis Kelamin:</strong> {{ $mahasiswa->jenis_kelamin }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
