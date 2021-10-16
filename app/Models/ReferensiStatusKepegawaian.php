<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiStatusKepegawaian extends Model
{
    protected $table = 'ref_statusKepegawaian';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];

    public function cpnspns()
    {
        return $this->hasMany('App\Models\CPNSPNS', 'statusKepegawaian_id');
    }
}
