<?php

namespace Database\Seeders;

use App\Models\JadwalKuliah;
use Illuminate\Database\Seeder;

class JadwalKuliahSeeder extends Seeder
{
    public function run(): void
    {
        JadwalKuliah::create([
            'nama_jadwal' => 'Jadwal Semester Genap 2024/2025'
        ]);

        JadwalKuliah::create([
            'nama_jadwal' => 'Jadwal Semester Ganjil 2025/2026'
        ]);
    }
}
