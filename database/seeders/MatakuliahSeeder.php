<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MataKuliah::create([
            'nama_matakuliah' => 'Pemrograman Dasar',
            'dosen_nip' => '198912341001',
            'jurusan_id' => 1,
            'semester' => 1,
            'sks' => 3
        ]);

        MataKuliah::create([
            'nama_matakuliah' => 'Basis Data',
            'dosen_nip' => '197811221002',
            'jurusan_id' => 2,
            'semester' => 2,
            'sks' => 4
        ]);
    }
}
