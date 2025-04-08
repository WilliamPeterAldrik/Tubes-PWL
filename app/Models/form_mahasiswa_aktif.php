<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class form_mahasiswa_aktif extends Model
{
    protected $table = 'form_mahasiswa_aktif';   
    protected $primaryKey = 'id_form_mahasiswa_aktif';
    protected $fillable = [
        'id_form_mahasiswa_aktif',
        'semester',
        'alamat_lengkap',
        'keperluan',
        'status',
        'nip',
        'nama'
    ];
    protected $keyType = 'string';

    public  $incrementing = false;
}
