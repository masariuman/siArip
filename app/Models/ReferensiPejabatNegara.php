<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiPejabatNegara extends Model
{
    protected $table = 'ref_pejabatNegara';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
