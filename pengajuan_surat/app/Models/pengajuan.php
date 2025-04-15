<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengajuan extends Model
{
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    public $incrementing = false; // because it's a string, not an integer
    protected $keyType = 'string'; // since it's a VARCHAR
     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'tanggal_pengajuan',
        'waktu_pengajuan',
        'status',
        'tujuan_pengajuan',
    ];
}
