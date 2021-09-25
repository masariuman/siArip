<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiPejabatPenetap extends Model
{
    protected $table = 'ref_pejabatPenetap';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
