<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('kelas', KelasController::class);
Route::resource('dosen', DosenController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('matakuliah', MataKuliahController::class);
Route::resource('nilai', NilaiMahasiswaController::class);
Route::resource('frs', FrsMahasiswaController::class);
Route::resource('jadwal', JadwalKuliahController::class);
