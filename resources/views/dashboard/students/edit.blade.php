@extends('layouts.app')
@section('title', 'Ubah Data Siswa')

@section('title-header', 'Ubah Data Siswa')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Data Siswa</a></li>
    <li class="breadcrumb-item active">Ubah Data Siswa</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Siswa</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.update', $student->id) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama Lengkap Siswa</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" placeholder="Nama Lengkap Siswa" value="{{ old('nama', $student->nama) }}"
                                        name="nama">

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nik">NIK Siswa</label>
                                    <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" placeholder="NIK Siswa" value="{{ old('nik', $student->nik) }}" name="nik">

                                    @error('nik')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nisn">NISN Siswa</label>
                                    <input type="number" class="form-control @error('nisn') is-invalid @enderror"
                                        id="nisn" placeholder="NISN Siswa" value="{{ old('nisn', $student->nisn) }}" name="nisn">

                                    @error('nisn')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nis">NIS Siswa</label>
                                    <input type="number" class="form-control @error('nis') is-invalid @enderror"
                                        id="nis" placeholder="NIS Siswa" value="{{ old('nis', $student->nis) }}" name="nis">

                                    @error('nis')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="no_kk">NO KK Siswa</label>
                                    <input type="number" class="form-control @error('no_kk') is-invalid @enderror"
                                        id="no_kk" placeholder="NO KK Siswa" value="{{ old('no_kk', $student->no_kk) }}"
                                        name="no_kk">

                                    @error('no_kk')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                        id="jenis_kelamin" name="jenis_kelamin">
                                        @php
                                            $roles = ['l', 'p'];
                                        @endphp
                                        <option value="" selected>---Jenis Kelamin---</option>
                                        @foreach ($roles as $jenis_kelamin)
                                            <option value="{{ $jenis_kelamin }}"
                                                @if (old('jenis_kelamin', $student->jenis_kelamin) == $jenis_kelamin) selected @endif>
                                                {{ $jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' }}</option>
                                        @endforeach
                                    </select>

                                    @error('role')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email">Email Siswa</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email Siswa" value="{{ old('email', $student->user->email) }}"
                                        name="email">

                                    @error('email')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tempat_lahir">Tempat Lahir Siswa</label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        id="tempat_lahir" placeholder="Tempat Lahir Siswa"
                                        value="{{ old('tempat_lahir', $student->tempat_lahir) }}" name="tempat_lahir">

                                    @error('tempat_lahir')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tanggal_lahir">Tanggal Lahir Siswa</label>
                                    <input type="date"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        id="tanggal_lahir" placeholder="Tanggal Lahir Siswa"
                                        value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" name="tanggal_lahir">

                                    @error('tanggal_lahir')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="no_registrasi_akta_lahir">NO Registrasi Akta Lahir Siswa</label>
                                    <input type="number"
                                        class="form-control @error('no_registrasi_akta_lahir') is-invalid @enderror"
                                        id="no_registrasi_akta_lahir" placeholder="NO Registrasi Akta Lahir Siswa"
                                        value="{{ old('no_registrasi_akta_lahir', $student->no_registrasi_akta_lahir) }}" name="no_registrasi_akta_lahir">

                                    @error('no_registrasi_akta_lahir')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="agama">Agama Siswa</label>
                                    <input type="text" class="form-control @error('agama') is-invalid @enderror"
                                        id="agama" placeholder="Agama Siswa" value="{{ old('agama', $student->agama) }}"
                                        name="agama">

                                    @error('agama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kewarganegaraan">Kewarganegaraan Siswa</label>
                                    <input type="text"
                                        class="form-control @error('kewarganegaraan') is-invalid @enderror"
                                        id="kewarganegaraan" placeholder="Kewarganegaraan Siswa"
                                        value="{{ old('kewarganegaraan', $student->kewarganegaraan) }}" name="kewarganegaraan">

                                    @error('kewarganegaraan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="kebutuhan_khusus">Kebutuhan Khusus Siswa</label>
                                    <input type="text"
                                        class="form-control @error('kebutuhan_khusus') is-invalid @enderror"
                                        id="kebutuhan_khusus" placeholder="Kebutuhan Khusus Siswa"
                                        value="{{ old('kebutuhan_khusus', $student->kebutuhan_khusus) }}" name="kebutuhan_khusus">

                                    @error('kebutuhan_khusus')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="alamat">Alamat Jalan Siswa</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat" placeholder="Alamat Jalan Siswa" value="{{ old('alamat', $student->alamat) }}"
                                        name="alamat">

                                    @error('alamat')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="rt">Alamat RT Siswa</label>
                                    <input type="number" class="form-control @error('rt') is-invalid @enderror"
                                        id="rt" placeholder="Alamat RT Siswa" value="{{ old('rt', $student->rt) }}"
                                        name="rt">

                                    @error('rt')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="rw">Alamat RW Siswa</label>
                                    <input type="number" class="form-control @error('rw') is-invalid @enderror"
                                        id="rw" placeholder="Alamat RW Siswa" value="{{ old('rw', $student->rw) }}"
                                        name="rw">

                                    @error('rw')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group mb-3">
                                    <label for="dusun">Dusun Siswa</label>
                                    <input type="text" class="form-control @error('dusun') is-invalid @enderror"
                                        id="dusun" placeholder="Dusun Siswa" value="{{ old('dusun', $student->dusun) }}"
                                        name="dusun">

                                    @error('dusun')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group mb-3">
                                    <label for="kelurahan">Kelurahan Siswa</label>
                                    <input type="text" class="form-control @error('kelurahan') is-invalid @enderror"
                                        id="kelurahan" placeholder="Kelurahan Siswa" value="{{ old('kelurahan', $student->kelurahan) }}"
                                        name="kelurahan">

                                    @error('kelurahan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group mb-3">
                                    <label for="kecamatan">Kecamatan Siswa</label>
                                    <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                        id="kecamatan" placeholder="Kecamatan Siswa" value="{{ old('kecamatan', $student->kecamatan) }}"
                                        name="kecamatan">

                                    @error('kecamatan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group mb-3">
                                    <label for="kode_pos">Kode POS</label>
                                    <input type="number" class="form-control @error('kode_pos') is-invalid @enderror"
                                        id="kode_pos" placeholder="Kode POS" value="{{ old('kode_pos', $student->kode_pos) }}"
                                        name="kode_pos">

                                    @error('kode_pos')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="tempat_tinggal">Tempat Tinggal Siswa</label>
                                    <input type="text"
                                        class="form-control @error('tempat_tinggal') is-invalid @enderror"
                                        id="tempat_tinggal" placeholder="Tempat Tinggal Siswa"
                                        value="{{ old('tempat_tinggal', $student->tempat_tinggal) }}" name="tempat_tinggal">

                                    @error('tempat_tinggal')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="moda_transportasi">Moda Transportasi Siswa</label>
                                    <input type="text"
                                        class="form-control @error('moda_transportasi') is-invalid @enderror"
                                        id="moda_transportasi" placeholder="Moda Transportasi Siswa"
                                        value="{{ old('moda_transportasi', $student->moda_transportasi) }}" name="moda_transportasi">

                                    @error('moda_transportasi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="anak_ke">Anak Ke</label>
                                    <input type="number" class="form-control @error('anak_ke') is-invalid @enderror"
                                        id="anak_ke" placeholder="Anak Ke" value="{{ old('anak_ke', $student->anak_ke) }}"
                                        name="anak_ke">

                                    @error('anak_ke')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="no_kip">NO KIP Siswa</label>
                                    <input type="number" class="form-control @error('no_kip') is-invalid @enderror"
                                        id="no_kip" placeholder="NO KIP Siswa" value="{{ old('no_kip', $student->no_kip) }}"
                                        name="no_kip">

                                    @error('no_kip')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="tanggal_masuk_sekolah">Tanggal Masuk Sekolah</label>
                                    <input type="date"
                                        class="form-control @error('tanggal_masuk_sekolah') is-invalid @enderror"
                                        id="tanggal_masuk_sekolah" placeholder="Tanggal Masuk Sekolah"
                                        value="{{ old('tanggal_masuk_sekolah', $student->tanggal_masuk_sekolah) }}" name="tanggal_masuk_sekolah">

                                    @error('tanggal_masuk_sekolah')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="sekolah_asal">Sekolah Asal Siswa</label>
                                    <input type="text"
                                        class="form-control @error('sekolah_asal') is-invalid @enderror"
                                        id="sekolah_asal" placeholder="Sekolah Asal Siswa"
                                        value="{{ old('sekolah_asal', $student->sekolah_asal) }}" name="sekolah_asal">

                                    @error('sekolah_asal')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="no_peserta_ujian_nasional">NO Peserta UN SMP</label>
                                    <input type="text"
                                        class="form-control @error('no_peserta_ujian_nasional') is-invalid @enderror"
                                        id="no_peserta_ujian_nasional" placeholder="NO Peserta UN SMP"
                                        value="{{ old('no_peserta_ujian_nasional', $student->no_peserta_ujian_nasional) }}" name="no_peserta_ujian_nasional">

                                    @error('no_peserta_ujian_nasional')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('students.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
