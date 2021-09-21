<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiKedudukanKepegawaian extends Model
{
    protected $table = 'ref_kedudukanKepegawaian';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
