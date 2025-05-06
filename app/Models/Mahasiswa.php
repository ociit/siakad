<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $primaryKey = 'nrp';
    public $incrementing = false;
    protected $fillable = ['nrp', 'nama', 'email', 'password', 'kelas_id', 'semester', 'no_telp'];

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }

    public function frs() {
        return $this->hasMany(FrsMahasiswa::class, 'mahasiswa_nrp', 'nrp');
    }

    public function nilai() {
        return $this->hasMany(NilaiMahasiswa::class, 'mahasiswa_nrp', 'nrp');
    }
}
