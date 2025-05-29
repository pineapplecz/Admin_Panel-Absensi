<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Http\Request;


class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawais.index', compact('pegawais'));
    }

    public function create()
    {
         $jabatans = Jabatan::all(); // Pastikan ini ada
    return view('pegawais.create', compact('jabatans'));
    }


public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'jabatan_id' => 'required|exists:jabatans,id',
        'email' => 'required|email|unique:pegawais,email',
    ]);

    // Tambahkan user_id dari user yang login
    $validated['user_id'] = auth()->id();

    Pegawai::create($validated);

    return redirect()->route('pegawais.index')->with('success', 'Pegawai berhasil ditambahkan.');
}

    public function edit(Pegawai $pegawai)
    {
          $jabatans = Jabatan::all();
    return view('pegawais.edit', compact('pegawai', 'jabatans'));
    }

  public function update(Request $request, Pegawai $pegawai)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:pegawais,email,' . $pegawai->id,
        'jabatan_id' => 'required|exists:jabatans,id',
    ]);

    $pegawai->update($validated);

    return redirect()->route('pegawais.index')->with('success', 'Pegawai berhasil diperbarui.');
}

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawais.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
