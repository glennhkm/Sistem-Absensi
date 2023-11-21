<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        // 'id',
        'nama_siswa',
        'NISN',
        'tanggal_lahir',
        'jenis_kelamin'
    ];
    use HasFactory;
}
