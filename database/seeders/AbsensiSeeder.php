<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absensi;

class AbsensiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['pegawai_id' => 1, 'tanggal' => '2025-05-01', 'status' => 'Hadir'],
            ['pegawai_id' => 2, 'tanggal' => '2025-05-01', 'status' => 'Sakit'],
            ['pegawai_id' => 3, 'tanggal' => '2025-05-01', 'status' => 'Izin'],
            ['pegawai_id' => 4, 'tanggal' => '2025-05-02', 'status' => 'Hadir'],
            ['pegawai_id' => 5, 'tanggal' => '2025-05-02', 'status' => 'Hadir'],
        ];

        foreach ($data as $absensi) {
            Absensi::create($absensi);
        }
    }
}
