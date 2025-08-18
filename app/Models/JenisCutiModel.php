<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCutiModel extends Model
{
    use HasFactory;

    protected $table = 'jenis_cuti';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_cuti',
    ];

    // Relasi ke cuti
    public function cuti()
    {
        return $this->hasMany(CutiModel::class, 'id_jenis_cuti');
    }
}
