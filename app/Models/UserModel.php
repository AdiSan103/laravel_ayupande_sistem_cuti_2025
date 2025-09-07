<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'role',
        'foto',
        'nip',
        'nama',
        'password',
        'tempat_lahir',
        'tanggal_lahir',
        'telp',
        'email',
        'jabatan',
        'masa_kerja'
    ];

    /**
     * Relasi ke Jatah Cuti
     */
    public function jatahCuti()
    {
        return $this->hasMany(JatahCutiModel::class, 'id_user');
    }

    /**
     * Relasi ke Cuti
     */
    public function cuti()
    {
        return $this->hasMany(CutiModel::class, 'id_user');
    }
}
