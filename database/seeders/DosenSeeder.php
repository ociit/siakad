<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dosen::create([
            'nip' => '198912341001',
            'nama' => 'Dr. Ahmad Subagyo',
            'email' => 'ahmad@kampus.ac.id',
            'password' => Hash::make('password123'),
            'jurusan_id' => 1,
            'no_telp' => '081234567890',
            'isDosenWali' => true,
        ]);

        Dosen::create([
            'nip' => '197811221002',
            'nama' => 'Prof. Nina Kartika',
            'email' => 'nina@kampus.ac.id',
            'password' => Hash::make('password123'),
            'jurusan_id' => 2,
            'no_telp' => '081298765432',
            'isDosenWali' => false,
        ]);

        Dosen::create([
            'nip' => '199005051003',
            'nama' => 'Dr. Iwan Prasetyo',
            'email' => 'iwan@kampus.ac.id',
            'password' => Hash::make('password123'),
            'jurusan_id' => 1,
            'no_telp' => '082112345678',
            'isDosenWali' => true,
        ]);
    }
}
