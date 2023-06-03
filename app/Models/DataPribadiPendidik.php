<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPribadiPendidik extends Model
{
    use HasFactory;

    protected $table = 'data_pribadi_pendidiks';

    protected $fillable = [
        'pendidik_id', // foreign key
        'alamat_jalan',
        'rt',
        'rw',
        'dusun',
        'kelurahan',
        'kecamatan',
        'kode_pos',
        'no_kk',
        'agama',
        'npwp',
        'nama_wajib_pajak',
        'kewarganegaraan',
        'status_kawin',
        'nama_pasangan',
        'nip_pasangan',
        'pekerjaan_pasangan',
    ];

    public function pendidik()
    {
        return $this->belongsTo(Pendidik::class, 'pendidik_id', 'id');
    }

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->created_at = now();
        });

        static::updating(function ($query) {
            $query->updated_at = now();
        });
    }
}
