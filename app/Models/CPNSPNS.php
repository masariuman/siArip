<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CPNSPNS extends Model
{
    protected $table = 'cpnspns';
    protected $fillable = [
        'rinku',
        'pegawai_id',
        'statusKepegawaian_id',
        'nomorSkCpns',
        'tanggalSkCpns',
        'tmtCpns',
        'namaPejabatPenetapCpns',
        'nomorSkPns',
        'tanggalSkPns',
        'tmtPns',
        'nomorSttpl',
        'tanggalSttpl',
        'nomorSpmt',
        'tanggalSpmt',
        'nomorPertekC2th',
        'tanggalPertekC2th',
        'nomorSkd',
        'tanggalSkd',
        'karpeg',
        'sutattsu',
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\User', 'pegawai_id');
    }
    public function statusKepegawaian()
    {
        return $this->belongsTo('App\Models\ReferensiStatusKepegawaian', 'statusKepegawaian_id');
    }
}
