<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiEselonJabatan extends Model
{
    protected $table = 'ref_eselonJabatan';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
