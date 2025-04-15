<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class laporan_hasil_studi extends Model
{
    protected $table = 'laporan_hasil_studi';
    protected $primaryKey = 'id_laporan_hasil_studi';
    protected $fillable = [
        'nip',
        'nama',
        'keperluan',
        'status'
    ];
    protected $keyType = 'string';
    protected $attributes = [
        'status' => 'pending', 
    ];
}