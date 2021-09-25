<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiJurusanPendidikan extends Model
{
    protected $table = 'ref_jurusanPendidikan';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
