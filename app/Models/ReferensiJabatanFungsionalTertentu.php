<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiJabatanFungsionalTertentu extends Model
{
    protected $table = 'ref_jabatanFungsionalTertentu';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
