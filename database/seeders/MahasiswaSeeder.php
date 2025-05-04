<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::insert([
        [
            'nrp' => '42210001',
            'nama' => 'Rizky Hidayat',
            'email' => 'rizky@example.com',
            'password' => Hash::make('password123'),
            'kelas_id' => 1,
            'semester' => 4,
            'no_telp' => '081234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nrp' => '42210002',
            'nama' => 'Nadia Putri',
            'email' => 'nadia@example.com',
            'password' => Hash::make('password123'),
            'kelas_id' => 1,
            'semester' => 4,
            'no_telp' => '082345678901',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    }
}
