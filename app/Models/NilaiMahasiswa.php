<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiMahasiswa extends Model
{
    protected $table = 'nilai_mahasiswas';
    protected $fillable = ['mahasiswa_nrp', 'matakuliah_id', 'dosen_nip', 'nilai_uts', 'nilai_uas', 'nilai_tugas', 'nilai_akhir', 'grade', 'semester'];
    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nrp', 'nrp');
    }

    public function matakuliah() {
        return $this->belongsTo(MataKuliah::class);
    }

    public function dosen() {
        return $this->belongsTo(Dosen::class);
    }
}
