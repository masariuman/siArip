<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsip';
    protected $fillable = [
        'rinku',
        'name',
        'keterangan',
        'pegawai_id',
        'kategori_id',
        'file',
        'sutattsu'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\User', 'pegawai_id');
    }
    public function kategori()
    {
        return $this->belongsTo('App\Models\ReferensiKategoriArsip', 'kategori_id');
    }
}
