<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalMataKuliah extends Model
{
    protected $table = 'jadwal_matakuliahs';
    protected $fillable = ['jadwal_kuliah_id', 'matakuliah_id', 'dosen_nip', 'dosen_pengajar2_nip', 'hari', 'jam_mulai', 'jam_selesai', 'ruangan', 'semester'];

    public function jadwalKuliah()
    {
        return $this->belongsTo(JadwalKuliah::class);
    }

    public function mataKuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }

    public function dosenUtama()
    {
        return $this->belongsTo(Dosen::class, 'dosen_nip', 'nip');
    }

    public function dosenTambahan()
    {
        return $this->belongsTo(Dosen::class, 'dosen_pengajar2_nip', 'nip');
    }
}
