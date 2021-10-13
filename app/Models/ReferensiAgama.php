<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiAgama extends Model
{
    protected $table = 'ref_agama';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];

    public function identitasPegawai()
    {
        return $this->hasMany('App\Models\IdentitasPegawai', 'agama_id');
    }
}
