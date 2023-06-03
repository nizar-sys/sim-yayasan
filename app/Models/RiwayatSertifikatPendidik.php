<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSertifikatPendidik extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendidik_id',
        'jenis_sertifikasi',
        'nomor_sertifikasi',
        'tahun_sertifikasi',
        'bidang_studi',
        'nomor_peserta',
    ];

    public function pendidik()
    {
        return $this->belongsTo(Pendidik::class);
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
