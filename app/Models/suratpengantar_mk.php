<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class suratpengantar_mk extends Model
{
    protected $table = 'suratpengantar_mk';
    protected $primaryKey = 'id_suratpengantar_mk';
    protected $fillable = [
        'id_suratpengantar_mk',
        'ditujukan_kepada',
        'kodeMk-namaMK',
        'semester',
        'anggota',
        'tujuan',
        'topik',
        'status',
        'nip',
        'nama'
    ];
    protected $keyType = 'string';

    public  $incrementing = false;
}