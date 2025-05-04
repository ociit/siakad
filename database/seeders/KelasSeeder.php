<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'nama_kelas' => 'TI-2023-A',
            'jurusan_id' => 1,
            'dosen_nip' => '198912341001', //! pastikan isDosenWali = true
            'semester' => 2,
            'jadwal_kuliah_id' => 1,
        ]);

        Kelas::create([
            'nama_kelas' => 'TI-2023-B',
            'jurusan_id' => 1,
            'dosen_nip' => '199005051003', //! pastikan isDosenWali = true
            'semester' => 4,
            'jadwal_kuliah_id' => 2,
        ]);
    }
}
