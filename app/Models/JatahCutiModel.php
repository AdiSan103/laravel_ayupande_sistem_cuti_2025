<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JatahCutiModel extends Model
{
    use HasFactory;

    protected $table = 'jatah_cuti';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user',
        'tahun',
        'jatah_cuti',
    ];

    // Relasi ke pengguna
    public function pengguna()
    {
        return $this->belongsTo(PenggunaModel::class, 'id_user');
    }
}
