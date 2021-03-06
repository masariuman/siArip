<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiUnor extends Model
{
    protected $table = 'ref_unor';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];

    public function ref_bidang()
    {
        return $this->hasMany('App\Models\ReferensiBidang', 'refunor_id');
    }
}
