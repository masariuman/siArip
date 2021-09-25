<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiJabatanKORPI extends Model
{
    protected $table = 'ref_jabatanKORPRI';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
