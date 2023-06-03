<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'jenis',
        'tingkat',
        'nama_acara',
        'tahun',
        'penyelenggara',
        'peringkat',
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
