<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Crud Simple Laravel 10</h3>

                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA MAHASISWA</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Foto Profil</th>
                                <th scope="col">Universitas</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIM</th>
                                <th scope="col">No Telpon</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($mahasiswas as $mahasiswa)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/posts/'.$mahasiswa->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $mahasiswa->universitas->nama}}</td>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->nim}}</td>
                                    <td>{{ $mahasiswa->no_telp}}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                                            <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data mahasiswa belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $mahasiswas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>