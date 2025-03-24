<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
