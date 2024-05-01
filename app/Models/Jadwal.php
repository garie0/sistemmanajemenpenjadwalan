<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'id_user',
        'id_matkul',
        'tanggal',
        'start_time',
        'end_time',
        'lokasi',
        'kelas',
        'jurusan',
        'deskripsi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul');
    }
}

