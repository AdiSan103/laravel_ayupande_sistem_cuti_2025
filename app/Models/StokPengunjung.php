<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokPengunjung extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'stok_pengunjung';

    // Specify the primary key field
    protected $primaryKey = 'no';

    // If the primary key is auto-incrementing, this should be set to true (default behavior for integer keys)
    public $incrementing = true;

    // Specify the data type of the primary key (if necessary)
    protected $keyType = 'int';

    // Enable automatic timestamps management
    public $timestamps = true;

    // Fields that can be mass-assigned
    protected $fillable = [
        'tanggal',
        'id_pengunjung',
        'nama_lengkap',
        'dewasa',
        'bayi',
        'anak',
        'destinasi',
        'taksir',
        'list'
    ];
}
