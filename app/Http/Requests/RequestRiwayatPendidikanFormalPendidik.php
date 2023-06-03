<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRiwayatPendidikanFormalPendidik extends FormRequest
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
            'bidang_studi' => 'required|string',
            'jenjang_pendidikan' => 'required|string',
            'gelar_akademik' => 'required|string',
            'satuan_pendidikan' => 'required|string',
            'fakultas' => 'required|string',
            'kependidikan' => 'required|string',
            'tahun_masuk' => 'required|numeric',
            'tahun_lulus' => 'required|numeric',
            'nis_nim' => 'required|numeric',
            'masih_studi' => 'required|string',
            'semester' => 'required|numeric',
            'rata_rata_nilai_ipk' => 'required|numeric',
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
            'pendidik_id.required' => 'Pendidik ID harus diisi',
            'pendidik_id.exists' => 'Pendidik ID tidak ditemukan',
            'bidang_studi.required' => 'Bidang Studi harus diisi',
            'bidang_studi.string' => 'Bidang Studi harus berupa string',
            'jenjang_pendidikan.required' => 'Jenjang Pendidikan harus diisi',
            'jenjang_pendidikan.string' => 'Jenjang Pendidikan harus berupa string',
            'gelar_akademik.required' => 'Gelar Akademik harus diisi',
            'gelar_akademik.string' => 'Gelar Akademik harus berupa string',
            'satuan_pendidikan.required' => 'Satuan Pendidikan harus diisi',
            'satuan_pendidikan.string' => 'Satuan Pendidikan harus berupa string',
            'fakultas.required' => 'Fakultas harus diisi',
            'fakultas.string' => 'Fakultas harus berupa string',
            'kependidikan.required' => 'Kependidikan harus diisi',
            'kependidikan.string' => 'Kependidikan harus berupa string',
            'tahun_masuk.required' => 'Tahun Masuk harus diisi',
            'tahun_masuk.numeric' => 'Tahun Masuk harus berupa angka',
            'tahun_lulus.required' => 'Tahun Lulus harus diisi',
            'tahun_lulus.numeric' => 'Tahun Lulus harus berupa angka',
            'nis_nim.required' => 'NIS/NIM harus diisi',
            'nis_nim.numeric' => 'NIS/NIM harus berupa angka',
            'masih_studi.required' => 'Masih Studi harus diisi',
            'masih_studi.string' => 'Masih Studi harus berupa string',
            'semester.required' => 'Semester harus diisi',
            'semester.numeric' => 'Semester harus berupa angka',
            'rata_rata_nilai_ipk.required' => 'Rata-rata Nilai IPK harus diisi',
            'rata_rata_nilai_ipk.numeric' => 'Rata-rata Nilai IPK harus berupa angka',
        ];
    }
}
