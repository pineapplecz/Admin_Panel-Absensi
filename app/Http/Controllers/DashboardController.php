<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Absensi;
use App\Models\Cuti;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahJabatan = Jabatan::count();
        $jumlahPegawai = Pegawai::count();
        $jumlahAbsensi = Absensi::count();
        $jumlahCuti = Cuti::count();

        return view('dashboard', compact('jumlahJabatan', 'jumlahPegawai', 'jumlahAbsensi', 'jumlahCuti'));
    }
}
