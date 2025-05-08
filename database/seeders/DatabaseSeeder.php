<?php

namespace Database\Seeders;

use App\Models\FrsMahasiswa;
use App\Models\JadwalKuliah;
use App\Models\Kelas;
use App\Models\NilaiMahasiswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            DepartemenSeeder::class,
            JurusanSeeder::class,
            DosenSeeder::class,
            MatakuliahSeeder::class,
            JadwalKuliahSeeder::class,
            JadwalMataKuliahSeeder::class,
            KelasSeeder::class,
            MahasiswaSeeder::class,
            FrsMahasiswaSeeder::class,
            NilaiMahasiswaSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    }
}
