<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiPejabatNegara extends Model
{
    protected $table = 'pejabatNegara';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
