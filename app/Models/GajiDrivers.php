<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiDrivers extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'gaji_drivers';

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
        'nama_drivers',
        'plat_mobil',
        'rekapan_kerja',
        'tanggal',
        'id_pengunjung',
        'nama_lengkap_pengunjung',
        'dewasa',
        'bayi',
        'anak',
        'destinasi',
        'taksir',
        'date',
        'income',
        'bonus',
        'slip',
        'id_gaji_drivers'
    ];
}
