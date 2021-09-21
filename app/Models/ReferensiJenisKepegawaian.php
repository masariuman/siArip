<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiJenisKepegawaian extends Model
{
    protected $table = 'ref_jenisKepegawaian';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
