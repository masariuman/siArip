<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiSubBidang extends Model
{
    protected $table = 'ref_subbid';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'refBidang_id',
        'created_at',
        'updated_at'
    ];

    public function ref_bidang()
    {
        return $this->belongsTo('App\Models\ReferensiBidang','refBidang_id');
    }
}
