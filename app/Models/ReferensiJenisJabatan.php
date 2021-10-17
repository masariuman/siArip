<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferensiJenisJabatan extends Model
{
    protected $table = 'ref_jenisJabatan';
    protected $fillable = [
        'name',
        'sutattsu',
        'rinku',
        'created_at',
        'updated_at'
    ];

    public function jabatan()
    {
        return $this->hasMany('App\Models\Jabatan', 'jenisJabatan_id');
    }
}
