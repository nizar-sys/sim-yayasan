<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenugasanPendidik extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendidik_id',
        'nomor_surat_tugas',
        'tanggal_surat_tugas',
        'tmt_tugas',
        'status_sekolah_induk',
    ];

    public function pendidik()
    {
        return $this->belongsTo(Pendidik::class, 'pendidik_id', 'id');
    }

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($dataPenugasanPendidik) {
            $dataPenugasanPendidik->created_at = now();
        });

        static::updating(function ($dataPenugasanPendidik) {
            $dataPenugasanPendidik->updated_at = now();
        });
    }
}
