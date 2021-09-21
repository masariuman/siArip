<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiJenisPenghargaan extends Model
{
    protected $table = 'ref_jenisPenghargaan';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
