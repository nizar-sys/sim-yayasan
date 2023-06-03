<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdatePendidik extends FormRequest
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
        $rules =  [
            'nama' => 'required|string|max:255',
            'nik_paspor' => 'required|string|max:255|unique:pendidiks,nik_paspor,' . $this->id,
            'jenis_kelamin' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nama_ibu_kandung' => 'required|string|max:255',
            'email' => 'required|string|max:255|',
        ];

        if ($this->method() == 'POST') {
            $rules['password'] = 'required|max:255';
            $rules['email'] = 'required|max:255|unique:users,email';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'nik_paspor.required' => 'NIK/Paspor harus diisi.',
            'nik_paspor.string' => 'NIK/Paspor harus berupa string.',
            'nik_paspor.max' => 'NIK/Paspor maksimal 255 karakter.',
            'nik_paspor.unique' => 'NIK/Paspor sudah terdaftar.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'jenis_kelamin.string' => 'Jenis kelamin harus berupa string.',
            'jenis_kelamin.max' => 'Jenis kelamin maksimal 255 karakter.',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'tempat_lahir.string' => 'Tempat lahir harus berupa string.',
            'tempat_lahir.max' => 'Tempat lahir maksimal 255 karakter.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal.',
            'nama_ibu_kandung.required' => 'Nama ibu kandung harus diisi.',
            'nama_ibu_kandung.string' => 'Nama ibu kandung harus berupa string.',
            'nama_ibu_kandung.max' => 'Nama ibu kandung maksimal 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.string' => 'Email harus berupa string.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'password.max' => 'Password maksimal 255 karakter.',
        ];
    }
}
