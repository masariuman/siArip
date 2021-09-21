<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiJenisHukumanDisiplin extends Model
{
    protected $table = 'ref_jenisHukumanDisiplin';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
