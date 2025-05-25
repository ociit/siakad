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
Route::resource('frs-mahasiswa', FrsMahasiswaController::class);
Route::resource('jadwal-kuliah', JadwalKuliahController::class);
Route::prefix('jadwal-kuliah/{jadwal_kuliah}')->group(function () {
    Route::get('matakuliah/create', [JadwalMataKuliahController::class, 'create'])->name('jadwal-matakuliah.create');
    Route::post('matakuliah', [JadwalMataKuliahController::class, 'store'])->name('jadwal-matakuliah.store');
    Route::get('matakuliah/{matakuliah}/edit', [JadwalMataKuliahController::class, 'edit'])->name('jadwal-matakuliah.edit');
    Route::put('matakuliah/{matakuliah}', [JadwalMataKuliahController::class, 'update'])->name('jadwal-matakuliah.update');
    Route::delete('matakuliah/{matakuliah}', [JadwalMataKuliahController::class, 'destroy'])->name('jadwal-matakuliah.destroy');
});

Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen.index');
Route::get('/departemen/create', [DepartemenController::class, 'create'])->name('departemen.create');
Route::post('/departemen', [DepartemenController::class, 'store'])->name('departemen.store');
Route::get('/departemen/{id}/edit', [DepartemenController::class, 'edit'])->name('departemen.edit');
Route::put('/departemen/{id}', [DepartemenController::class, 'update'])->name('departemen.update');
Route::delete('/departemen/{id}', [DepartemenController::class, 'destroy'])->name('departemen.destroy');

Route::get('/departemen/{id}/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/departemen/{id}/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/departemen/{id}/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/jurusan/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');