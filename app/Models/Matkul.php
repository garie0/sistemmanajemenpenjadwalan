<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_matkul'; // Menentukan nama kolom kunci utama yang benar

    protected $fillable = [
        'nm_matkul',
        'dosen',
        'sks',
        'keterangan'
    ];
    public function jadwal()
    {
        return $this->hasOne(Jadwal::class, 'id_matkul');
    }
}

