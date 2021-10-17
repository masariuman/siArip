<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    protected $table = 'pangkat';
    protected $fillable = [
        'rinku',
        'pegawai_id',
        'pangkat_id',
        'jenisNaikPangkat_id',
        'masaKerjaGolonganTahun',
        'masaKerjaGolonganBulan',
        'tmtGolongan',
        'nomorSk',
        'tanggalSk',
        'nomorPertek',
        'tanggalPertek',
        'sutattsu'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\User', 'pegawai_id');
    }
    public function pangkat()
    {
        return $this->belongsTo('App\Models\ReferensiPangkatGolonganRuang', 'pangkat_id');
    }
    public function jenisNaikPangkat()
    {
        return $this->belongsTo('App\Models\ReferensiJenisNaikPangkat', 'jenisNaikPangkat_id');
    }
}
