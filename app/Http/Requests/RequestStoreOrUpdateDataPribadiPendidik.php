<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateDataPribadiPendidik extends FormRequest
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
            'alamat_jalan' => 'required|string',
            'rt' => 'required',
            'rw' => 'required',
            'dusun' => 'required|string',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|numeric',
            'no_kk' => 'required|numeric',
            'agama' => 'required|string',
            'npwp' => 'nullable|numeric',
            'nama_wajib_pajak' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'status_kawin' => 'required|string',
            'nama_pasangan' => 'nullable|string',
            'nip_pasangan' => 'nullable|numeric',
            'pekerjaan_pasangan' => 'nullable|string',
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
            'alamat_jalan.required' => 'Alamat jalan harus diisi',
            'rt.required' => 'RT harus diisi',
            'rw.required' => 'RW harus diisi',
            'dusun.required' => 'Dusun harus diisi',
            'kelurahan.required' => 'Kelurahan harus diisi',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kode_pos.required' => 'Kode pos harus diisi',
            'no_kk.required' => 'Nomor KK harus diisi',
            'agama.required' => 'Agama harus diisi',
            'nama_wajib_pajak.required' => 'Nama wajib pajak harus diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan harus diisi',
            'status_kawin.required' => 'Status kawin harus diisi',
            'npwp.numeric' => 'NPWP harus berupa angka',
            'no_kk.numeric' => 'Nomor KK harus berupa angka',
            'nip_pasangan.numeric' => 'NIP pasangan harus berupa angka',
        ];
    }
}
