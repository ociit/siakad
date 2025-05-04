<?php

namespace Database\Seeders;

use App\Models\NilaiMahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NilaiMahasiswa::create([
            'mahasiswa_nrp' => '42210001',
            'matakuliah_id' => 1,
            'dosen_nip' => '198912341001',
            'nilai_uts' => 85.00,
            'nilai_uas' => 90.00,
            'nilai_tugas' => 88.00,
            'nilai_akhir' => 88.00,
            'grade' => 'A',
            'semester' => 4,
        ]);

        NilaiMahasiswa::create([
            'mahasiswa_nrp' => '42210002',
            'matakuliah_id' => 1,
            'dosen_nip' => '198912341001',
            'nilai_uts' => 75.00,
            'nilai_uas' => 80.00,
            'nilai_tugas' => 78.00,
            'nilai_akhir' => 78.00,
            'grade' => 'B',
            'semester' => 4,
        ]);
    }
}
