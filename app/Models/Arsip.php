<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsip';
    protected $fillable = [
        'rinku',
        'name',
        'keterangan',
        'pegawai_id',
        'file',
        'sutattsu'
    ];
}
