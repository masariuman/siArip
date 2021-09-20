<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiBidang extends Model
{
    protected $table = 'ref_bidang';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'refUnor_id',
        'created_at',
        'updated_at'
    ];

    public function ref_unor()
    {
        return $this->belongsTo('App\Models\ReferensiUnor','refUnor_id');
    }

    public function ref_subBidang()
    {
        return $this->hasMany('App\Models\ReferensiSubBidang', 'refBidang_id');
    }
}
