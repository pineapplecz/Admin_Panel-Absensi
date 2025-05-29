<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        $cutis = Cuti::with('pegawai')->orderBy('tanggal_mulai', 'desc')->paginate(10);
        return view('cutis.index', compact('cutis'));
    }

    public function create()
    {
        $pegawais = Pegawai::orderBy('nama')->get();
        return view('cutis.create', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string|max:255',
        ]);

        Cuti::create($request->all());

        return redirect()->route('cutis.index')->with('success', 'Cuti berhasil dibuat.');
    }

    public function edit(Cuti $cuti)
    {
        $pegawais = Pegawai::orderBy('nama')->get();
        return view('cutis.edit', compact('cuti', 'pegawais'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string|max:255',
        ]);

        $cuti->update($request->all());

        return redirect()->route('cutis.index')->with('success', 'Cuti berhasil diperbarui.');
    }

    public function destroy(Cuti $cuti)
    {
        $cuti->delete();
        return redirect()->route('cutis.index')->with('success', 'Cuti berhasil dihapus.');
    }
    public function storeFromDashboard(Request $request)
{
    $request->validate([
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        'alasan' => 'required|string|max:255',
    ]);

    Cuti::create([
        'pegawai_id' => auth()->user()->pegawai->id, // pastikan user punya relasi ke pegawai
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
        'alasan' => $request->alasan,
    ]);

    return redirect()->back()->with('success', 'Pengajuan cuti/izin berhasil.');
}

    
}
