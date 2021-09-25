<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiDiklatStruktural extends Model
{
    protected $table = 'ref_diklatStruktural';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
