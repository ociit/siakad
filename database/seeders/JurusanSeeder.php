<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::insert([
            ['nama_jurusan' => 'Teknik Elektro', 'departemen_id' => 1],
            ['nama_jurusan' => 'Teknik Sipil', 'departemen_id' => 1],
            ['nama_jurusan' => 'Teknik Informatika', 'departemen_id' => 2],
            ['nama_jurusan' => 'Sistem Informasi', 'departemen_id' => 2],
            ['nama_jurusan' => 'Manajemen', 'departemen_id' => 3],
        ]);
    }
}
