<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ReferensiJenisNaikPangkat extends Model
{
    protected $table = 'ref_jenisNaikPangkat';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];

    public function pangkat()
    {
        return $this->hasMany('App\Models\Pangkat', 'jenisNaikPangkat_id');
    }
}
