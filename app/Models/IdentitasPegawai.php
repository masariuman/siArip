<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentitasPegawai extends Model
{
    protected $table = 'identitasPegawai';
    protected $fillable = [
        'rinku',
        'pegawai_id',
        'alamat',
        'telepon',
        'handphone',
        'emailDinas',
        'emailPribadi',
        'nik',
        'nomorKK',
        'agama_id',
        'lokasiKerja',
        'npwp',
        'tanggalNpwp',
        'bpjs',
        'karis',
        'taspen',
        'tanggalTaspen',
        'tapera',
        'kppn',
        'kelasJabatan',
        'sutattsu',
        'akta',
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\User', 'pegawai_id');
    }
    public function agama()
    {
        return $this->belongsTo('App\Models\ReferensiAgama', 'agama_id');
    }
}
