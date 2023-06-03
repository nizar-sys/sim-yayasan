<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEducatorCarrier extends FormRequest
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
            'jenjang_pendidikan' => 'required|string',
            'jenis_lembaga' => 'required|string',
            'status_kepegawaian' => 'required|string',
            'jenis_ptk' => 'required|string',
            'lembaga_pengangkat' => 'required|string',
            'no_sk_kerja' => 'required|string',
            'tgl_sk_kerja' => 'required|date',
            'tmt_kerja' => 'required|string',
            'tst_kerja' => 'required|string',
            'tempat_kerja' => 'required|string',
            'mapel_diajarkan' => 'required|string',
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
            'jenjang_pendidikan.required' => 'Jenjang pendidikan harus diisi',
            'jenjang_pendidikan.string' => 'Jenjang pendidikan harus berupa string',
            'jenis_lembaga.required' => 'Jenis lembaga harus diisi',
            'jenis_lembaga.string' => 'Jenis lembaga harus berupa string',
            'status_kepegawaian.required' => 'Status kepegawaian harus diisi',
            'status_kepegawaian.string' => 'Status kepegawaian harus berupa string',
            'jenis_ptk.required' => 'Jenis PTK harus diisi',
            'jenis_ptk.string' => 'Jenis PTK harus berupa string',
            'lembaga_pengangkat.required' => 'Lembaga pengangkat harus diisi',
            'lembaga_pengangkat.string' => 'Lembaga pengangkat harus berupa string',
            'no_sk_kerja.required' => 'No SK kerja harus diisi',
            'no_sk_kerja.string' => 'No SK kerja harus berupa string',
            'tgl_sk_kerja.required' => 'Tanggal SK kerja harus diisi',
            'tgl_sk_kerja.date' => 'Tanggal SK kerja harus berupa date',
            'tmt_kerja.required' => 'TMT kerja harus diisi',
            'tmt_kerja.string' => 'TMT kerja harus berupa string',
            'tst_kerja.required' => 'TST kerja harus diisi',
            'tst_kerja.string' => 'TST kerja harus berupa string',
            'tempat_kerja.required' => 'Tempat kerja harus diisi',
            'tempat_kerja.string' => 'Tempat kerja harus berupa string',
            'mapel_diajarkan.required' => 'Mapel diajarkan harus diisi',
        ];
    }
}
