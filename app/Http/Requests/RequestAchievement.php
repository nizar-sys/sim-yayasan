<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAchievement extends FormRequest
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
            'siswa_id' => 'required|exists:siswas,id',
            'jenis' => 'required|',
            'tingkat' => 'required|',
            'nama_acara' => 'required|',
            'tahun' => 'required|',
            'penyelenggara' => 'required|',
            'peringkat' => 'required|',
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
            'siswa_id.required' => 'Siswa harus diisi',
            'siswa_id.exists' => 'Siswa tidak ditemukan',
            'jenis.required' => 'Prestasi harus diisi',
            'tingkat.required' => 'Tingkat harus diisi',
            'nama_acara.required' => 'Nama jenis harus diisi',
            'tahun.required' => 'Tahun harus diisi',
            'penyelenggara.required' => 'Penyelenggara harus diisi',
            'peringkat.required' => 'Peringkat harus diisi',
        ];
    }
}
