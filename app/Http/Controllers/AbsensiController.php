<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with('pegawai')->orderBy('tanggal', 'desc')->paginate(10);
        return view('absensis.index', compact('absensis'));
    }

    public function create()
    {
        $pegawais = Pegawai::orderBy('nama')->get();
        return view('absensis.create', compact('pegawais'));
    }

  public function store(Request $request)
{
    $validated = $request->validate([
        'pegawai_id' => 'required|exists:pegawais,id',
        'tanggal' => 'required|date',
        'status' => 'required|in:Hadir,Izin,Sakit',
    ]);

    Absensi::create($validated);

    return redirect()->route('absensis.index')->with('success', 'Data absensi berhasil ditambahkan!');
}

    public function edit(Absensi $absensi)
    {
        $pegawais = Pegawai::orderBy('nama')->get();
        return view('absensis.edit', compact('absensi', 'pegawais'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
          'pegawai_id' => 'required|exists:pegawais,id',
        'tanggal' => 'required|date',
        'status' => 'required|in:Hadir,Izin,Sakit',
    ]);

        $absensi->update($request->all());

        return redirect()->route('absensis.index')->with('success', 'Absensi berhasil diperbarui.');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('absensis.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
