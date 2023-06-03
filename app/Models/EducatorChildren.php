<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducatorChildren extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendidik_id',
        'nama_anak',
        'status',
        'jenjang',
        'nisn',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'tahun_masuk_sekolah',
    ];

    protected $appends = [
        'jenis_kelamin_text'
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

    public function getJenisKelaminTextAttribute()
    {
        if ($this->jenis_kelamin == 'l') {
            return 'Laki-laki';
        } else {
            return 'Perempuan';
        }
    }
}
