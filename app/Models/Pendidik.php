<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidik extends Model
{
    use HasFactory;

    protected $table = 'pendidiks';
    protected $fillable = [
        'user_id', // tambahkan ini
        'nama',
        'nik_paspor',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ibu_kandung',
    ];

    protected $appends = [
        'tanggal_lahir_formatted',
        'jenis_kelamin_formatted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pendidik) {
            $pendidik->created_at = now();
        });

        static::updating(function ($pendidik) {
            $pendidik->updated_at = now();
        });
    }

    // accessor new
    public function getTanggalLahirFormattedAttribute()
    {
        return $this->attributes['tanggal_lahir_formatted'] = Carbon::parse($this->attributes['tanggal_lahir'])->format('d M Y');
    }

    public function getJenisKelaminFormattedAttribute()
    {
        return $this->attributes['jenis_kelamin_formatted'] = $this->attributes['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan';
    }

    public function dataPribadi()
    {
        return $this->hasOne(DataPribadiPendidik::class, 'pendidik_id', 'id');
    }

    public function dataKepegawaian()
    {
        return $this->hasOne(DataKepegawaianPendidik::class, 'pendidik_id', 'id');
    }

    public function dataKontak()
    {
        return $this->hasOne(DataKontak::class, 'pendidik_id', 'id');
    }

    public function dataPenugasan()
    {
        return $this->hasOne(DataPenugasanPendidik::class, 'pendidik_id', 'id');
    }

    public function dataSertifikasi()
    {
        return $this->hasMany(RiwayatSertifikatPendidik::class, 'pendidik_id', 'id');
    }
}
