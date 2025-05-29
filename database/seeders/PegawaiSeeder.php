<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\User;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user dummy jika belum ada
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'), // pastikan password diisi
            ]
        );

        // Jika user tidak berhasil dibuat atau ditemukan
        if (!$user) {
            echo "Gagal membuat user. Seeder berhenti.";
            return;
        }

        $data = [
            ['nama' => 'Setiana Nastiti', 'email' => 'niyagawulandari@cv.desa.id', 'jabatan' => 'Keuangan'],
            ['nama' => 'Farrel Reyza', 'email' => 'kasiyahsiregar@pd.co.id', 'jabatan' => 'Keuangan'],
            ['nama' => 'Iedha Aisyah', 'email' => 'sabrinamaheswara@gmail.com', 'jabatan' => 'Manager'],
            ['nama' => 'Ichsan Anggoro', 'email' => 'zaenab88@ud.id', 'jabatan' => 'Staff IT'],
            ['nama' => 'Dhaffin Hidayat', 'email' => 'humairanasyidah@yahoo.com', 'jabatan' => 'Marketing'],
        ];

        foreach ($data as $item) {
            $jabatan = Jabatan::firstOrCreate(['nama' => $item['jabatan']]);

            Pegawai::create([
                'nama'       => $item['nama'],
                'email'      => $item['email'],
                'jabatan_id' => $jabatan->id,
                'user_id'    => $user->id, // aman sekarang karena $user pasti ada
            ]);
        }
    }
}
