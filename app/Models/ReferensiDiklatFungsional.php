<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiDiklatFungsional extends Model
{
    protected $table = 'ref_diklatFungsional';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
