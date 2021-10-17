<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $fillable = [
        'rinku',
        'pegawai_id',
        'jenisJabatan_id',
        'subbid_id',
        'jabatan',
        'tmtJabatan',
        'tmtPelantikan',
        'nomorSk',
        'tanggalSk',
        'sutattsu'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\User', 'pegawai_id');
    }
    public function subbid()
    {
        return $this->belongsTo('App\Models\ReferensiSubBidang', 'subbid_id');
    }
    public function jenisJabatan()
    {
        return $this->belongsTo('App\Models\ReferensiJenisJabatan', 'jenisJabatan_id');
    }
}
