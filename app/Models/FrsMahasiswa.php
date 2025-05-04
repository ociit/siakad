<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrsMahasiswa extends Model
{
    protected $table = 'frs_mahasiswas';
    protected $fillable = ['mahasiswa_nrp', 'matakuliah_id', 'semester', 'status', 'tanggal_pengajuan'];
    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nrp', 'nrp');
    }

    public function matakuliah() {
        return $this->belongsTo(MataKuliah::class);
    }
}
