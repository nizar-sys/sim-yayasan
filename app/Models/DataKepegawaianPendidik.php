<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKepegawaianPendidik extends Model
{
    use HasFactory;

    protected $table = 'data_kepegawaian_pendidiks';

    protected $fillable = [
        'pendidik_id',
        'status_kepegawaian',
        'nip',
        'niy_nigk',
        'nuptk',
        'jenis_ptk',
        'sk_pengangkatan',
        'tmt_pengangkatan',
        'lembaga_pengangkat',
        'sk_cpns',
        'tmt_cpns',
        'pangkat_golongan',
        'sumber_gaji',
        'kartu_pegawai',
        'kartu_pasangan'
    ];

    public function pendidik()
    {
        return $this->belongsTo(Pendidik::class, 'pendidik_id', 'id');
    }
}
