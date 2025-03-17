<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'id',
        'password',
        'email',
        'no_telefon',
        'program_studi_id_programstudi',
        'program_studi_fakultas_id_fakultas',
        'program_studi_kaprodi_id',
    ];
}
