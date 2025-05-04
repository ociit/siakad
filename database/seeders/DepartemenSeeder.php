<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departemen::insert([
            ['nama_departemen' => 'Fakultas Teknik'],
            ['nama_departemen' => 'Fakultas Ilmu Komputer'],
            ['nama_departemen' => 'Fakultas Ekonomi'],
        ]);
    }
}
