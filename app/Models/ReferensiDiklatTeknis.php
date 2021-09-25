<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiDiklatTeknis extends Model
{
    protected $table = 'ref_diklatTeknis';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
