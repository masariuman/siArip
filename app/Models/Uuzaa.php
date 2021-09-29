<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uuzaa extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'rinku',
        'juugyouinBangou',
        'name',
        'yuuzaaMei',
        'sashin',
        'reberu',
        'subBidang_id',
        'login',
        'password',
        'sutattsu',
        'nip9',
        'gelarDepan',
        'gelarBelakang',
        'tempatLahir',
        'tanggalLahir'
    ];

    public function ref_subbid()
    {
        return $this->belongsTo('App\Models\ReferensiSubBidang', 'subBidang_id');
    }
}
