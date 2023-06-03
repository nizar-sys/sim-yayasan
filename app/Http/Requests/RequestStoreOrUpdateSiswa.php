<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateSiswa extends FormRequest
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
            'nama' => 'required|string|max:255',
            'nisn' => 'required|numeric',
            'nis' => 'required|numeric',
            'nik' => 'required|numeric',
            'no_kk' => 'required|numeric',
            'jenis_kelamin' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|max:255',
            'no_registrasi_akta_lahir' => 'required|numeric',
            'agama' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'kebutuhan_khusus' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'rt' => 'required|string|max:255',
            'rw' => 'required|string|max:255',
            'dusun' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kode_pos' => 'required|numeric',
            'tempat_tinggal' => 'required|string|max:255',
            'moda_transportasi' => 'required|string|max:255',
            'anak_ke' => 'required|numeric',
            'no_kip' => 'required|numeric',
            'tanggal_masuk_sekolah' => 'required|date',
            'sekolah_asal' => 'required|string|max:255',
            'no_peserta_ujian_nasional' => 'required',
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
            'nama.required' => 'Nama harus diisi',
            'nisn.required' => 'NISN harus diisi',
            'nik.required' => 'NIK harus diisi',
            'no_kk.required' => 'No KK harus diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'no_registrasi_akta_lahir.required' => 'No Registrasi Akta Lahir harus diisi',
            'agama.required' => 'Agama harus diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan harus diisi',
            'kebutuhan_khusus.required' => 'Kebutuhan Khusus harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'rt.required' => 'RT harus diisi',
            'rw.required' => 'RW harus diisi',
            'dusun.required' => 'Dusun harus diisi',
            'kelurahan.required' => 'Kelurahan harus diisi',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kode_pos.required' => 'Kode Pos harus diisi',
            'tempat_tinggal.required' => 'Tempat Tinggal harus diisi',
            'moda_transportasi.required' => 'Moda Transportasi harus diisi',
            'anak_ke.required' => 'Anak Ke harus diisi',
            'no_kip.required' => 'No KIP harus diisi',
            'tanggal_masuk_sekolah.required' => 'Tanggal Masuk Sekolah harus diisi',
            'sekolah_asal.required' => 'Sekolah Asal harus diisi',
            'no_peserta_ujian_nasional.required' => 'No Peserta Ujian Nasional harus diisi',
            'nisn.numeric' => 'NISN harus berupa angka',
            'nik.numeric' => 'NIK harus berupa angka',
            'no_kk.numeric' => 'No KK harus berupa angka',
            'no_registrasi_akta_lahir.numeric' => 'No Registrasi Akta Lahir harus berupa angka',
            'kode_pos.numeric' => 'Kode Pos harus berupa angka',
            'anak_ke.numeric' => 'Anak Ke harus berupa angka',
            'no_kip.numeric' => 'No KIP harus berupa angka',
            'no_peserta_ujian_nasional.numeric' => 'No Peserta Ujian Nasional harus berupa angka',
            'tanggal_lahir.date' => 'Tanggal Lahir harus berupa tanggal',
            'tanggal_masuk_sekolah.date' => 'Tanggal Masuk Sekolah harus berupa tanggal',
            'nis.required' => 'NIS harus diisi',
            'nis.numeric' => 'NIS harus berupa angka',
        ];
    }
}
