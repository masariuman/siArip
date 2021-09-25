<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiJabatanFungsionalUmum extends Model
{
    protected $table = 'ref_jabatanFungsionalUmum';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
