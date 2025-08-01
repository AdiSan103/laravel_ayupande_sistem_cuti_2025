<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiAdmin extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'gaji_admin';

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
        'nama_admin',
        'kontak',
        'check_in',
        'check_out',
        'rekaman',
        'absensi',
        'date',
        'income',
        'bonus',
        'slip_gaji',
        'id_gaji_admin'
    ];
}
