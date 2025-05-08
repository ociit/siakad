<?php

namespace Database\Seeders;

use App\Models\JadwalKuliah;
use App\Models\JadwalMataKuliah;
use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class JadwalMataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        $jadwal = JadwalKuliah::first();
        $matakuliahs = MataKuliah::all();
        $dosens = Dosen::pluck('nip')->toArray();

        if (!$jadwal || $matakuliahs->isEmpty() || count($dosens) < 1) {
            return;
        }

        foreach ($matakuliahs->take(5) as $mk) {
            JadwalMataKuliah::create([
                'jadwal_kuliah_id' => $jadwal->id,
                'matakuliah_id' => $mk->id,
                'dosen_nip' => $dosens[0],
                'dosen_pengajar2_nip' => $dosens[1] ?? null,
                'hari' => fake()->dayOfWeek(),
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                'ruangan' => 'Ruang ' . fake()->numberBetween(101, 110),
                'semester' => fake()->numberBetween(1, 8),
            ]);
        }
    }
}
