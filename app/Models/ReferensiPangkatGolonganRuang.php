<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiPangkatGolonganRuang extends Model
{
    protected $table = 'ref_pangkatGolonganRuang';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'pangkat',
        'created_at',
        'updated_at'
    ];

    public function pangkat()
    {
        return $this->hasMany('App\Models\Pangkat', 'pangkat_id');
    }
}
