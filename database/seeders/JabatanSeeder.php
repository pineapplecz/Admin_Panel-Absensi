<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'nama' => 'Manager'],
            ['id' => 2, 'nama' => 'Staff IT'],
            ['id' => 3, 'nama' => 'HRD'],
            ['id' => 4, 'nama' => 'Marketing'],
            ['id' => 5, 'nama' => 'Keuangan'],
        ];

        foreach ($data as $jabatan) {
            Jabatan::updateOrCreate(['id' => $jabatan['id']], $jabatan);
        }
    }
}
