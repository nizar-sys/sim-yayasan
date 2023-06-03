<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPeriodic extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'tinggi_badan',
        'berat_badan',
        'lingkar_kepala',
        'jarak_ke_sekolah',
        'waktu_tempuh',
        'jumlah_saudara_kandung',
    ];

    public function student()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
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
