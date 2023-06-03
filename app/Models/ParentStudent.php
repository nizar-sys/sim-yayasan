<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'sebagai',
        'nama_lengkap',
        'nik',
        'tanggal_lahir',
        'pendidikan',
        'pekerjaan',
        'penghasilan_bulanan',
        'berkebutuhan_khusus',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($parentStudent) {
            $parentStudent->created_at = now();
        });

        static::updating(function ($parentStudent) {
            $parentStudent->updated_at = now();
        });
    }
}
