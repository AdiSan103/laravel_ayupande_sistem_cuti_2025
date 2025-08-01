<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPengunjung extends Model
{
    use SoftDeletes;
    use HasFactory;

    // Define the table name
    protected $table = 'data_pengunjung';

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
        'import_pengunjung',
        'password',
        'email',
    ];
}
