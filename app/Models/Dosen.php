<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = ['nip', 'nama', 'alamat', 'no_hp', 'program_studi', 'password'];

    protected $primaryKey = 'nip';

    public $incrementing = false;

    protected $keyType = 'string';

}