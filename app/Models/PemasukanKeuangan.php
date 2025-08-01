<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukanKeuangan extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'pemasukan_keuangan';

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
        'pemasukan',
        'id_pemasukan_keuangan',
        'datestart',
        'dateend',
        'gaji_admin',
        'gaji_vendor',
        'gaji_drivers',
        'drivers',
        'vendor',
        'admin',
        'status', // 1 = sudah dibayar , 2 = belum
    ];
    
    public function rsDriver()
    {
        return $this->hasOne(Supir::class, 'no', 'drivers')->withTrashed();
    }

    public function rsOwner()
    {
        return $this->hasOne(DataJabatan::class, 'no', 'vendor')->withTrashed();
    }

    public function rsKeuanganDetail()
    {
        return $this->hasMany(PemasukanKeuanganDetail::class, 'no', 'pemasukan_keuangan_no')->withTrashed();
    }
}
