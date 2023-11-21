<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = [
      'id_siswa', 
      'status', 
      'tanggal_absen'
    ];
    use HasFactory;

    public function siswa()
    {
      return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
