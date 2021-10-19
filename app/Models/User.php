<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function heya()
    {
        return $this->belongsTo('App\Models\Heya', 'heya_id');
    }

    public function ref_subbid()
    {
        return $this->belongsTo('App\Models\ReferensiSubBidang', 'subBidang_id');
    }
    public function arsip()
    {
        return $this->hasMany('App\Models\Arsip', 'pegawai_id');
    }
    public function identitasPegawai()
    {
        return $this->hasMany('App\Models\IdentitasPegawai', 'pegawai_id');
    }
    public function cpnspns()
    {
        return $this->hasMany('App\Models\CPNSPNS', 'pegawai_id');
    }

    public function pangkat()
    {
        return $this->hasMany('App\Models\Pangkat', 'pegawai_id');
    }

    public function jabatan()
    {
        return $this->hasMany('App\Models\Jabatan', 'pegawai_id');
    }
}
