<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_nrp',
        'matakuliah_id',
        'dosen_nip',
        'semester',
        'nilai_uts',
        'nilai_uas',
        'nilai_tugas',
        'nilai_akhir',
        'grade',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nrp', 'nrp');
    }

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_nip', 'nip');
    }

    public function jadwalMatakuliah()
    {
        return $this->belongsTo(JadwalMatakuliah::class);
    }
}
