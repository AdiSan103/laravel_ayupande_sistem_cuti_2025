<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembagianKerja extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'pembagian_kerja';

    // Specify the primary key field
    protected $primaryKey = 'no';

    // Enable auto-incrementing for the primary key
    public $incrementing = true;

    // Specify the primary key type (integer)
    protected $keyType = 'int';

    // Enable automatic timestamps
    public $timestamps = true;

    // Fields that are mass-assignable
    protected $fillable = [
        'id_drivers',
        'id_pengunjung1',
        'id_pengunjung2',
        'nama_vendor',
        'kontak',
        'plat_mobil',
        'id_pengunjung_list',
        'supir',
        'drivers',
        'vendor',
        'tanggal',
        'id_pengunjung',
        'nama_lengkap_pengunjung',
        'dewasa',
        'bayi',
        'anak',
        'destinasi',
        'taksir',
        'list',
        'daftar_pengunjung',
        'akun_pengunjung',
        'id_pembagian_kerja'
    ];

    public function rsSupir()
    {
        return $this->hasOne(Supir::class, 'no', 'drivers')->withTrashed();
    }

    public function rsPengunjung()
    {
        return $this->hasOne(DataPengunjung::class, 'id_pengunjung', 'id_pengunjung')->withTrashed();
    }

    public function rsOwner()
    {
        return $this->hasOne(DataJabatan::class, 'no', 'vendor')->withTrashed();
    }
}

// rs -> RelationShip
