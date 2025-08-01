<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukanKeuanganDetail extends Model
{
    use HasFactory;

    // Define the table name explicitly, since Laravel will expect 'absensi_supirs' by default.
    protected $table = 'pemasukan_keuangan_detail';

    // Specify the primary key column if it is different from 'id'.
    protected $primaryKey = 'no';

    // Indicate that the primary key is not auto-incrementing if it's a custom type.
    public $incrementing = true;

    // Specify the data type of the primary key, if necessary.
    protected $keyType = 'int';

    // Mass-assignable attributes (fields that can be filled directly using Eloquent)
    protected $fillable = [
        'pemasukan_keuangan_no', 
        'pembagian_kerja_no', 
    ];

    // Automatically manage `created_at` and `updated_at` fields
    public $timestamps = true;

    public function rsPembagianKerja()
    {
        return $this->hasOne(PembagianKerja::class, 'no', 'pembagian_kerja_no')->withTrashed();
    }
}
