<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendapatanVendor extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'pendapatan_vendor';

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
        'nama',
        'kontak',
        'plat_mobil',
        'nama_pengunjung',
        'tanggal',
        'pendapatan',
        'nama_drivers',
        'potongan',
        'id_pendapatan_vendor'
    ];
}
