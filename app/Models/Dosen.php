<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// Ubah extends Model menjadi Authenticatable jika perlu autentikasi
class Dosen extends Authenticatable
{
    protected $primaryKey = 'nip';
    protected $table = 'dosens'; // pastikan ini sesuai dengan nama tabel di database
    public $incrementing = false;
    protected $keyType = 'string'; // tambahkan ini jika nip adalah string

    protected $fillable = [
        'nip', 
        'nama', 
        'email', 
        'password', 
        'jurusan_id', 
        'no_telp', 
        'isDosenWali'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }

    public function jadwalKuliah() {
        return $this->hasMany(JadwalKuliah::class, 'dosen_nip', 'nip');
    }
}