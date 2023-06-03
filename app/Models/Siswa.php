<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public $table = "siswas";

    protected $fillable = [
        'user_id',
        'nama',
        'nisn',
        'nis',
        'nik',
        'no_kk',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_registrasi_akta_lahir',
        'agama',
        'kewarganegaraan',
        'kebutuhan_khusus',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'kelurahan',
        'kecamatan',
        'kode_pos',
        'tempat_tinggal',
        'moda_transportasi',
        'anak_ke',
        'no_kip',
        'tanggal_masuk_sekolah',
        'sekolah_asal',
        'no_peserta_ujian_nasional',
    ];

    protected $appends = [
        'jenis_kelamin_label',
    ];

    public function getJenisKelaminLabelAttribute()
    {
        if ($this->jenis_kelamin == 'l') {
            return 'Laki-laki';
        } else {
            return 'Perempuan';
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($siswa) {
            $siswa->created_at = now();
        });

        static::updating(function ($siswa) {
            $siswa->updated_at = now();
        });
    }

    public function parents()
    {
        return $this->hasMany(ParentStudent::class, 'siswa_id', 'id');
    }

    public function dataKontak()
    {
        return $this->hasOne(ContactStudent::class, 'siswa_id', 'id');
    }

    public function dataPeriodik()
    {
        return $this->hasOne(StudentPeriodic::class, 'siswa_id', 'id');
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'siswa_id', 'id');
    }
}
