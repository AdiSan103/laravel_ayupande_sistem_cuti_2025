<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JatahCutiModel extends Model
{
    use HasFactory;

    protected $table = 'jatah_cuti';

    protected $fillable = [
        'id_user',
        'tahun',
        'jatah_cuti'
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user');
    }
}
