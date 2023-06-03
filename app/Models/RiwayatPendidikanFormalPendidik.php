<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikanFormalPendidik extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendidik_id',
        'bidang_studi',
        'jenjang_pendidikan',
        'gelar_akademik',
        'satuan_pendidikan',
        'fakultas',
        'kependidikan',
        'tahun_masuk',
        'tahun_lulus',
        'nis_nim',
        'masih_studi',
        'semester',
        'rata_rata_nilai_ipk',
    ];

    public function pendidik()
    {
        return $this->belongsTo(Pendidik::class, 'pendidik_id', 'id');
    }

    // function boot
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_at = now();
        });

        static::updating(function ($model) {
            $model->updated_at = now();
        });
    }
}
