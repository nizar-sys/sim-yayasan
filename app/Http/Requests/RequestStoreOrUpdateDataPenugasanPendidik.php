<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateDataPenugasanPendidik extends FormRequest
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
            'nomor_surat_tugas' => 'required',
            'tanggal_surat_tugas' => 'required|date',
            'tmt_tugas' => 'required|',
            'status_sekolah_induk' => 'required|string',
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
            'nomor_surat_tugas.required' => 'Nomor Surat Tugas harus diisi',
            'tanggal_surat_tugas.required' => 'Tanggal Surat Tugas harus diisi',
            'tanggal_surat_tugas.date' => 'Tanggal Surat Tugas harus berupa tanggal',
            'tmt_tugas.required' => 'TMT Tugas harus diisi',
            'tmt_tugas.date' => 'TMT Tugas harus berupa tanggal',
            'status_sekolah_induk.required' => 'Status Sekolah Induk harus diisi',
            'status_sekolah_induk.string' => 'Status Sekolah Induk harus berupa string',
        ];
    }
}
