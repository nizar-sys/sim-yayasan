<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestParentStudent extends FormRequest
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
            'sebagai' => 'required|in:ayah,ibu,wali',
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|numeric|max:255',
            'tanggal_lahir' => 'required|date',
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'penghasilan_bulanan' => 'required|numeric|max:255',
            'berkebutuhan_khusus' => 'required|string|max:255',
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
            'siswa_id.required' => 'Siswa harus diisi.',
            'siswa_id.exists' => 'Siswa tidak ditemukan.',
            'sebagai.required' => 'Sebagai harus diisi.',
            'sebagai.in' => 'Sebagai tidak valid.',
            'nama_lengkap.required' => 'Nama lengkap harus diisi.',
            'nama_lengkap.string' => 'Nama lengkap harus berupa string.',
            'nama_lengkap.max' => 'Nama lengkap maksimal 255 karakter.',
            'nik.required' => 'NIK harus diisi.',
            'nik.numeric' => 'NIK harus berupa angka.',
            'nik.max' => 'NIK maksimal 255 karakter.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal.',
            'pendidikan.required' => 'Pendidikan harus diisi.',
            'pendidikan.string' => 'Pendidikan harus berupa string.',
            'pendidikan.max' => 'Pendidikan maksimal 255 karakter.',
            'pekerjaan.required' => 'Pekerjaan harus diisi.',
            'pekerjaan.string' => 'Pekerjaan harus berupa string.',
            'pekerjaan.max' => 'Pekerjaan maksimal 255 karakter.',
            'penghasilan_bulanan.required' => 'Penghasilan bulanan harus diisi.',
            'penghasilan_bulanan.numeric' => 'Penghasilan bulanan harus berupa angka.',
            'penghasilan_bulanan.max' => 'Penghasilan bulanan maksimal 255 karakter.',
            'berkebutuhan_khusus.required' => 'Berkebutuhan khusus harus diisi.',
            'berkebutuhan_khusus.string' => 'Berkebutuhan khusus harus berupa string.',
            'berkebutuhan_khusus.max' => 'Berkebutuhan khusus maksimal 255 karakter.',
        ];
    }
}
