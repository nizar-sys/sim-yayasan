<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateRiwayatSertifikatPendidik extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'pendidik_id' => 'required|exists:pendidiks,id',
            'jenis_sertifikasi' => 'required|string',
            'nomor_sertifikasi' => 'required',
            'tahun_sertifikasi' => 'required|numeric',
            'bidang_studi' => 'required|',
            'nomor_peserta' => 'required|',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'pendidik_id.required' => 'Pendidik harus diisi',
            'pendidik_id.exists' => 'Pendidik tidak ditemukan',
            'jenis_sertifikasi.required' => 'Jenis sertifikasi harus diisi',
            'nomor_sertifikasi.required' => 'Nomor sertifikasi harus diisi',
            'tahun_sertifikasi.required' => 'Tahun sertifikasi harus diisi',
            'tahun_sertifikasi.numeric' => 'Tahun sertifikasi harus berupa angka',
            'bidang_studi.required' => 'Bidang studi harus diisi',
            'nomor_peserta.required' => 'Nomor peserta harus diisi',
        ];
    }
}
