<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiKategoriArsip extends Model
{
    protected $table = 'ref_kategoriArsip';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];
}
