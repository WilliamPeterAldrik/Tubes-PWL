<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keterangan_lulus extends Model{

    protected $table = 'surat_keterangan_lulus';
    protected $primaryKey = 'id_surat_keterangan_lulus';
    protected $fillable = [
        'id_surat_keterangan_lulus',
        'tgl_lulus',
        'status',
        'nip',
        'nama'
    ];
    protected $keyType = 'string';

    public  $incrementing = false;
}