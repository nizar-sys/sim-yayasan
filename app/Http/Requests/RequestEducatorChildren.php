<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEducatorChildren extends FormRequest
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
            'nama_anak' => 'required|string',
            'status' => 'required|string',
            'jenjang' => 'required|string',
            'nisn' => 'required|numeric',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tahun_masuk_sekolah' => 'required|numeric',
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
            '*.required' => ':attribute harus diisi.',
            '*.string' => ':attribute harus berupa string.',
            '*.numeric' => ':attribute harus berupa angka.',
            '*.date' => ':attribute harus berupa tanggal.',
            '*.exists' => ':attribute tidak ditemukan.',
        ];
    }

    /**
     * Get the attribute names for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            'pendidik_id' => 'Orang Tua',
            'nama_anak' => 'Nama Anak',
            'status' => 'Status',
            'jenjang' => 'Jenjang',
            'nisn' => 'NISN',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tahun_masuk_sekolah' => 'Tahun Masuk Sekolah',
        ];
    }
}
