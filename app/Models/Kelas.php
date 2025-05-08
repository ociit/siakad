<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas', 'jurusan_id', 'dosen_nip', 'semester', 'jadwal_kuliah_id'];

    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }

    public function dosen() {
        return $this->belongsTo(Dosen::class, 'dosen_nip', 'nip');
    }

    public function mahasiswas() {
        return $this->hasMany(Mahasiswa::class);
    }

    public function jadwalKuliah() {
        return $this->hasOne(JadwalKuliah::class, 'id', 'jadwal_kuliah_id');
    }
}
