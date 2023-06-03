<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatorCarrier extends Model
{
    use HasFactory;

    protected $fillable  = [
        'pendidik_id',
        'jenjang_pendidikan',
        'jenis_lembaga',
        'status_kepegawaian',
        'jenis_ptk',
        'lembaga_pengangkat',
        'no_sk_kerja',
        'tgl_sk_kerja',
        'tmt_kerja',
        'tst_kerja',
        'tempat_kerja',
        'mapel_diajarkan',
    ];

    // funnction boot
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

    // relation to educator
    public function pendidik()
    {
        return $this->belongsTo(Pendidik::class, 'pendidik_id', 'id');
    }
}
