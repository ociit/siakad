<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\ProviderMakeCommand;

class Dosen extends Model
{
    protected $table = 'dosens';
    protected $primaryKey = 'nip';
    public $incrementing = false;

    protected $fillable = ['nip', 'nama', 'email', 'password', 'jurusan_id', 'no_telp', 'isDosenWali'];
    public function jurusan(){
        return $this->belongsTo(Jurusan::class);
    }
    public function jadwalKuliah() {
        return $this->hasMany(JadwalKuliah::class, 'dosen_nip', 'nip');
    }
}
