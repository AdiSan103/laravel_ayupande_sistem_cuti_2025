<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutiModel extends Model
{
    use HasFactory;

    protected $table = 'cuti';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user',
        'id_jenis_cuti',
        'alasan',
        'tgl_awal',
        'tgl_akhir',
        'lama_hari',
        'alamat',
        'verifikasi_user_1',
        'verifikasi_user_2',
        'verifikasi_bupati',
        'status',
        'file_pendukung',
        'file_sudah_ttd',
        'no_surat',
        'catatan_admin'
    ];

    // Relasi ke pengguna
    public function pengguna()
    {
        return $this->belongsTo(PenggunaModel::class, 'id_user');
    }

    // Relasi ke jenis cuti
    public function jenisCuti()
    {
        return $this->belongsTo(JenisCutiModel::class, 'id_jenis_cuti');
    }
}
