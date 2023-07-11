<?php

namespace App\Http\Controllers;

//import model "post
use App\Models\Mahasiswa;

use App\Models\Universitas;

use Illuminate\Http\Request;

//return type view
use Illuminate\View\View;

//return type redirectResponse;
use Illuminate\Http\RedirectResponse;

//import facade "storage"
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
     /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get mahasiswa
        $mahasiswas = Mahasiswa::latest()->paginate(5);
        $universitas = Universitas::all();

        //render view with mahasiswa
        return view( 'mahasiswas.index', compact('mahasiswas', 'universitas'));
    }

    public function create(): View
    {
        $univ = Universitas::all();
        return view('mahasiswas.create', compact('univ'));
    }
     /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'universitas_id'=> 'required',
            'nama'          => 'required|min:5',
            'nim'           => 'required|unique:mahasiswas',
            'no_telp'       => 'required',
            'umur'          => 'required|numeric',
            'alamat'        => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'image'         => 'required',
        ]);
        
        //upload image
        $image = $request->file('image');
        $image->storeAs( 'public/posts', $image->hashName());
        
        //create mahasiswa
        Mahasiswa::create([
            'universitas_id'=> $request ->universitas_id,
            'nama'          => $request ->nama,
            'nim'           => $request ->nim,
            'no_telp'       => $request ->no_telp,
            'umur'          => $request ->umur,
            'alamat'        => $request ->alamat,
            'tanggal_lahir' => $request ->tanggal_lahir,
            'jenis_kelamin' => $request ->jenis_kelamin,
            'image'         => $image ->hashName()
        ]);
        
        //redirect to index
        return redirect()->route('mahasiswa.index')->with(['succes' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        //get mahasiswa by ID
        $mahasiswa = Mahasiswa::findOrFail($id);
        $universitas = Universitas::all();

        
        //render view with mahasiswa
        return view('mahasiswas.show', compact('mahasiswa', 'universitas'));
    }
    
    public function edit(string $id): View
    {
        //get mahasiswa by ID
        $mahasiswa = Mahasiswa::findOrFail($id);
        $universitas = Universitas::all();
        
        //render view with post
        return view('mahasiswas.edit', compact('mahasiswa', 'universitas'));
    }
    
    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'universitas_id' => 'required',
            'nama' => 'required|min:5',
            'nim' => 'required',
            'no_telp' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        //get mahasiswa by ID
        $mahasiswa = Mahasiswa::findOrFail($id);
        
        //chech if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());
            
            //delete old image
            Storage::delete('public/posts/'.$mahasiswa->image);
            
            //update mahasiswa with new image
            $mahasiswa->update([
                'universitas_id'=> $request ->universitas_id,
                'nama'          => $request ->nama,
                'nim'           => $request ->nim,
                'no_telp'       => $request ->no_telp,
                'umur'          => $request ->umur,
                'alamat'        => $request ->alamat,
                'tanggal_lahir' => $request ->tanggal_lahir,
                'jenis_kelamin' => $request ->jenis_kelamin,
                'image'         => $image ->hashName()
            ]);
            } else {

                //update mahasiswa without image
                $mahasiswa->update([
                    'universitas_id'=> $request ->universitas_id,
                    'nama'          => $request ->nama,
                    'nim'           => $request ->nim,
                    'no_telp'       => $request ->no_telp,
                    'umur'          => $request ->umur,
                    'alamat'        => $request ->alamat,
                    'tanggal_lahir' => $request ->tanggal_lahir,
                    'jenis_kelamin' => $request ->jenis_kelamin
                ]);
            }

            //redirect to index
            return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Diubah!']);
        }

        public function destroy($id): RedirectResponse
        {
            //get mahasiswa by ID
            $mahasiswa = Mahasiswa::findOrFail($id);

            //delete image
            Storage::delete('public/posts/'. $mahasiswa->image);

            //delete mahasiswa
            $mahasiswa->delete();

            //redirect to index
            return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }   