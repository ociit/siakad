<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'matakuliahs';
    protected $fillable = ['nama_matakuliah', 'dosen_nip', 'jurusan_id', 'semester', 'sks'];
    public function dosen() {
        return $this->belongsTo(Dosen::class, 'dosen_nip', 'nip');
    }

    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }

    public function jadwal() {
        return $this->hasOne(JadwalKuliah::class);
    }
}
