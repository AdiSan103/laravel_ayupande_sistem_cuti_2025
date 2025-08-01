<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supir extends Model
{
    use SoftDeletes;
    use HasFactory;

    // Define the table name explicitly, since Laravel will expect 'supirs' by default.
    protected $table = 'supir';

    // Specify the primary key column if it is different from 'id'.
    protected $primaryKey = 'no';

    // Indicate that the primary key is not auto-incrementing if it's a custom type.
    public $incrementing = true;

    // Specify the data type of the primary key, if necessary.
    protected $keyType = 'int';

    // Mass-assignable attributes (fields that can be filled directly using Eloquent)
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
        'password',
        'email',
    ];

    // Optionally, if you don’t need the `created_at` and `updated_at` timestamps, you can disable them like this:
    public $timestamps = true;
}
