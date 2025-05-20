<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('kelas', KelasController::class)->parameters([
    'kelas' => 'kelas'
]);
Route::resource('dosen', DosenController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('matakuliah', MataKuliahController::class);
Route::resource('nilai', NilaiMahasiswaController::class);
Route::resource('frs', FrsMahasiswaController::class);
Route::resource('jadwal-kuliah', JadwalKuliahController::class);
Route::prefix('jadwal-kuliah/{jadwal_kuliah}')->group(function () {
    Route::get('matakuliah/create', [JadwalMataKuliahController::class, 'create'])->name('jadwal-matakuliah.create');
    Route::post('matakuliah', [JadwalMataKuliahController::class, 'store'])->name('jadwal-matakuliah.store');
    Route::get('matakuliah/{matakuliah}/edit', [JadwalMataKuliahController::class, 'edit'])->name('jadwal-matakuliah.edit');
    Route::put('matakuliah/{matakuliah}', [JadwalMataKuliahController::class, 'update'])->name('jadwal-matakuliah.update');
    Route::delete('matakuliah/{matakuliah}', [JadwalMataKuliahController::class, 'destroy'])->name('jadwal-matakuliah.destroy');
});