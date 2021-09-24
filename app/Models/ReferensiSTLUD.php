<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiSTLUD extends Model
{
    protected $table = 'ref_STLUD';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
