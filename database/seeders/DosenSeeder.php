<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        $dosens = [
            [
                'nip' => '198912341001',
                'nama' => 'Dr. Ahmad Subagyo',
                'email' => 'ahmad@kampus.ac.id',
                'password' => Hash::make('password'),
                'jurusan_id' => 1,
                'no_telp' => '081234567890',
                'isDosenWali' => true,
            ],
            [
                'nip' => '197811221002',
                'nama' => 'Prof. Nina Kartika',
                'email' => 'nina@kampus.ac.id',
                'password' => Hash::make('password123'),
                'jurusan_id' => 2,
                'no_telp' => '081298765432',
                'isDosenWali' => false,
            ],
            [
                'nip' => '199005051003',
                'nama' => 'Dr. Iwan Prasetyo',
                'email' => 'iwan@kampus.ac.id',
                'password' => Hash::make('password123'),
                'jurusan_id' => 1,
                'no_telp' => '082112345678',
                'isDosenWali' => true,
            ],
        ];

        foreach ($dosens as $dosen) {
            Dosen::updateOrCreate(
                ['nip' => $dosen['nip']], // cek berdasarkan NIP
                $dosen // data yang akan di-update atau disisipkan
            );
        }
    }
}

