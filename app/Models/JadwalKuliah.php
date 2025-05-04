<?php

namespace App\Models;
use App\Models\MataKuliah; 
use App\Models\Dosen; 
use Illuminate\Database\Eloquent\Model;

class JadwalKuliah extends Model
{
    protected $table = 'jadwal_kuliahs';
    protected $fillable = ['matakuliah_id', 'dosen_nip', 'hari', 'jam_mulai', 'jam_selesai', 'ruangan', 'semester'];

    public function mataKuliah(){
        return $this->belongsTo(MataKuliah::class);
    }

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'dosen_nip', 'nip');
    }
}
