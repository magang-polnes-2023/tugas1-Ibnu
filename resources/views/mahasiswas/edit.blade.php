<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Foto</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                <!-- error message untuk image -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Universitas</label>
                                <select class="form-control @error('universitas_id') is-invalid @enderror" name="universitas_id">
                                    <option>--Pilih--</option>
                                    @foreach ($universitas as $univ)
                                    <option value="{{ $univ->id }}" {{ $univ->id == $mahasiswa->universitas_id ? 'selected' : '' }}>{{ $univ->nama }}</option>
                                    @endforeach
                                </select>
                            
                                <!-- error message untuk jenis_kelamin -->
                                @error('universitas_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $mahasiswa->nama }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{ $mahasiswa->nim }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No. Telepon</label>
                                <input type="text" class="form-control" name="no_telp" value="{{ $mahasiswa->no_telp }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Umur</label>
                                <input type="text" class="form-control" name="umur" value="{{ $mahasiswa->umur }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $mahasiswa->alamat }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="text" class="form-control" name="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                    <option value="Laki-laki" {{ $mahasiswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $mahasiswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            
                                <!-- error message untuk jenis_kelamin -->
                                @error('jenis_kelamin')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
</body>
</html>
