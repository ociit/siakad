<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalKuliah extends Model
{
    protected $table = 'jadwal_kuliahs';
    protected $fillable = ['nama_jadwal'];

    public function jadwalMatakuliahs()
    {
        return $this->hasMany(JadwalMataKuliah::class);
    }
}
