<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuti;

class CutiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['pegawai_id' => 1, 'tanggal_mulai' => '2025-06-01', 'tanggal_selesai' => '2025-06-05', 'alasan' => 'Liburan'],
            ['pegawai_id' => 2, 'tanggal_mulai' => '2025-07-10', 'tanggal_selesai' => '2025-07-12', 'alasan' => 'Acara keluarga'],
            ['pegawai_id' => 3, 'tanggal_mulai' => '2025-08-15', 'tanggal_selesai' => '2025-08-20', 'alasan' => 'Cuti sakit'],
            ['pegawai_id' => 4, 'tanggal_mulai' => '2025-09-01', 'tanggal_selesai' => '2025-09-03', 'alasan' => 'Pernikahan'],
            ['pegawai_id' => 5, 'tanggal_mulai' => '2025-10-05', 'tanggal_selesai' => '2025-10-10', 'alasan' => 'Liburan'],
        ];

        foreach ($data as $cuti) {
            Cuti::create($cuti);
        }
    }
}
