<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = ['nip', 'nama', 'alamat', 'no_hp', 'program_studi', 'password'];

    protected $primaryKey = 'nip';

    public $incrementing = false;
    protected $keyType = 'string';

    public function dosenProdi(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'nip');
    }
}