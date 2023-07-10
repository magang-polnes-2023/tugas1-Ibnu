<?php

namespace App\Http\Controllers;

use App\Models\Universitas;
use Illuminate\Http\Request;
//return type view
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class UniversitasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Illuminate\Http\Response;
     */
    public function index():View
    {
        $universitass = Universitas::latest()->paginate(5);
        return view('universitas.index', compact('universitass'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('universitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi form
        $this->validate($request, [
            'nama'      => 'required',
            'alamat'    => 'required',
            'no_telp'   => 'required',
            'email'     => 'required',
            'akreditas' => 'required',
        ]);

        Universitas::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'akreditas' => $request->akreditas,
        ]);

        return redirect()->route('universitas.index')->with('success', 'Data Universitas Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $universitas = Universitas::findOrFail($id);

        return view('universitas.show', compact('universitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $universitas = Universitas::findOrFail($id);

        return view('universitas.edit', compact('universitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'akreditas' => 'required',
        ]);

        $universitas = Universitas::findOrFail($id);

        $universitas->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'akreditas' => $request->akreditas,
        ]);

        //redirect ke index
        return redirect()->route('universitas.index')->with(['success' => 'Data Universitas Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $universitas = Universitas::findOrFail($id);

        $universitas->delete();

        return redirect()->route('universitas.index')-> with(['success' => 'Data Universitas Berhasil di Hapus']);
    }
}