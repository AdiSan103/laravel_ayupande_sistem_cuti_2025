<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataJabatan extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Define the table name
    protected $table = 'data_jabatan';

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
        'nama_panggilan',
        'nama_ktp',
        'kontak',
        'tipe_mobil',
        'tahun',
        'plat_mobil',
        'pengalaman',
        'sejak_tahun',
        'spoken_english',
        'vechicle_condition',
        'ground_knowledge',
        'export_data',
        'admin',
        'vendor',
        'drivers',
        'id_data_jabatan',
        'password',
        'email',
    ];
}
