<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiTingkatPendidikan extends Model
{
    protected $table = 'ref_tingkatPendidikan';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
