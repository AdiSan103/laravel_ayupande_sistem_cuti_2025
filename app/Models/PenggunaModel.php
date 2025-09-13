<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaModel extends Model
{
    use HasFactory;

    protected $table = 'user'; // nama tabel
    protected $primaryKey = 'id';

    protected $fillable = [
        'role',
        'foto',
        'nip',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'telp',
        'email',
        'jabatan',
        'masa_kerja',
    ];

    // Relasi ke jatah cuti (1 pengguna bisa punya banyak jatah cuti)
    public function jatahCuti()
    {
        return $this->hasMany(JatahCutiModel::class, 'id_user');
    }

    // Relasi ke cuti (1 pengguna bisa punya banyak cuti)
    public function cuti()
    {
        return $this->hasMany(CutiModel::class, 'id_user');
    }
}
