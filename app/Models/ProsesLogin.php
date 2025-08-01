<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesLogin extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'proses_login';

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
        'nama_freelancers',
        'check_in',
        'check_out',
        'rekaman',
        'am',
        'pm',
        'import_data',
        'admin',
        'vendor',
        'drivers',
        'quest',
        'id_proses_login'
    ];

    public function rsVendor()
    {
        return $this->hasOne(DataJabatan::class, 'no', 'vendor')->withTrashed();
    }

    public function rsDriver()
    {
        return $this->hasOne(Supir::class, 'no', 'drivers')->withTrashed();
    }

    public function rsQuest()
    {
        return $this->hasOne(DataPengunjung::class, 'no', 'quest')->withTrashed();
    }
}
