<?php

namespace Database\Seeders;

use App\Models\FrsMahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FrsMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FrsMahasiswa::create([
            'mahasiswa_nrp' => '42210001',
            'matakuliah_id' => 1,
            'semester' => 4,
            'status' => 'acc',
            'tanggal_pengajuan' => Carbon::now()->toDateString(),
        ]);

        FrsMahasiswa::create([
            'mahasiswa_nrp' => '42210002',
            'matakuliah_id' => 1,
            'semester' => 4,
            'status' => 'belum acc',
            'tanggal_pengajuan' => Carbon::now()->subDay()->toDateString(),
        ]);
    }
}
