<?php

namespace Database\Seeders;

use App\Models\JadwalKuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JadwalKuliah::create([
            'matakuliah_id' => 1,
            'dosen_nip' => '198912341001',
            'hari' => 'Senin',
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '10:00:00',
            'ruangan' => 'Lab A',
            'semester' => 1
        ]);

        JadwalKuliah::create([
            'matakuliah_id' => 2,
            'dosen_nip' => '197811221002',
            'hari' => 'Rabu',
            'jam_mulai' => '10:00:00',
            'jam_selesai' => '12:00:00',
            'ruangan' => 'Lab B',
            'semester' => 2
        ]);
    }
}
