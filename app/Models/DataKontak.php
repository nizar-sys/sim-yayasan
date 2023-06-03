<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendidik_id',
        'nomor_telepon_rumah',
        'nomor_hp',
    ];

    public function pendidik()
    {
        return $this->belongsTo(Pendidik::class, 'pendidik_id', 'id');
    }

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($dataKontak) {
            $dataKontak->created_at = now();
        });

        static::updating(function ($dataKontak) {
            $dataKontak->updated_at = now();
        });
    }
}
