<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserAbsensiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $hariIni = Carbon::today()->toDateString();

        $absensiHariIni = Absensi::where('pegawai_id', $user->id)
            ->whereDate('tanggal', $hariIni)
            ->first();

        return view('user.absen', compact('absensiHariIni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:hadir,sakit,izin,alpha,cuti',
        ]);

        Absensi::create([
            'pegawai_id' => Auth::id(),
            'tanggal' => now()->toDateString(),
            'status' => $request->status,
            'jam_masuk' => now()->format('H:i:s'),
        ]);

        return redirect()->route('absen.index')->with('success', 'Absensi berhasil dilakukan.');
    }
}
