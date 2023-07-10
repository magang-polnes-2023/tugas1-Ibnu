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
                        <div class="mt-3">
                            <h5>Data Mahasiswa:</h5>
                            <ul>
                                <li><strong>Nama:</strong> {{ $universitas->nama }}</li>
                                <li><strong>Alamat:</strong> {{ $universitas->alamat }}</li>
                                <li><strong>No. Telepon:</strong> {{ $universitas->no_telp }}</li>
                                <li><strong>Email:</strong> {{ $universitas->email }}</li>
                                <li><strong>Akreditas:</strong> {{ $universitas->akreditas }}</li>
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
