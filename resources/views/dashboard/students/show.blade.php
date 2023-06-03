@extends('layouts.app')
@section('title', 'Detail Data Siswa')

@section('title-header', 'Detail Data Siswa')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Data Siswa</a></li>
    <li class="breadcrumb-item active">Detail Data Siswa</li>
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="{{ asset('/assets/img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <form action="" id="form-upload" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="oldImage" id="oldImage" value="{{ $student->avatar }}">
                                <input type="file" class="d-none" name="image" id="uploadImage"><img
                                    style="cursor: pointer;" src="{{ asset('/uploads/images/' . $student->user->avatar) }}"
                                    class="rounded-circle" id="avaImage">
                            </form>

                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                </div>
                <div class="card-body pt-0 mt-xl-5">
                    <div class="text-center">
                        <h5 class="h3">
                            {{ $student->name }}
                        </h5>
                        <div class="h5 mt-2">
                            <i class="ni business_briefcase-24 mr-2"></i>{{ $student->role }}
                        </div>
                    </div>
                    <!-- Divider -->
                    <hr class="my-3">
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Identitas Siswa
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('students.update', $student->id) }}" method="POST" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nama">Nama Lengkap Siswa</label>
                                            <input type="text" required class="form-control @error('nama') is-invalid @enderror"
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
                                            <input type="number" required class="form-control @error('nik') is-invalid @enderror"
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
                                            <input type="number" required class="form-control @error('nisn') is-invalid @enderror"
                                                id="nisn" placeholder="NISN Siswa" value="{{ old('nisn', $student->nisn) }}" name="nisn">

                                            @error('nisn')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="nis">NIS Siswa</label>
                                            <input type="number" required class="form-control @error('nis') is-invalid @enderror"
                                                id="nis" placeholder="NIS Siswa" value="{{ old('nis', $student->nis) }}" name="nis">

                                            @error('nis')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="no_kk">NO KK Siswa</label>
                                            <input type="number" required class="form-control @error('no_kk') is-invalid @enderror"
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
                                            <select required class="form-control @error('jenis_kelamin') is-invalid @enderror"
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
                                            <input type="email" required class="form-control @error('email') is-invalid @enderror"
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
                                            <input type="text" required class="form-control @error('tempat_lahir') is-invalid @enderror"
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
                                                required class="form-control @error('tanggal_lahir') is-invalid @enderror"
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
                                                required class="form-control @error('no_registrasi_akta_lahir') is-invalid @enderror"
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
                                            <input type="text" required class="form-control @error('agama') is-invalid @enderror"
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
                                                required class="form-control @error('kewarganegaraan') is-invalid @enderror"
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
                                                required class="form-control @error('kebutuhan_khusus') is-invalid @enderror"
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
                                            <input type="text" required class="form-control @error('alamat') is-invalid @enderror"
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
                                            <input type="number" required class="form-control @error('rt') is-invalid @enderror"
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
                                            <input type="number" required class="form-control @error('rw') is-invalid @enderror"
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
                                            <input type="text" required class="form-control @error('dusun') is-invalid @enderror"
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
                                            <input type="text" required class="form-control @error('kelurahan') is-invalid @enderror"
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
                                            <input type="text" required class="form-control @error('kecamatan') is-invalid @enderror"
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
                                            <input type="number" required class="form-control @error('kode_pos') is-invalid @enderror"
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
                                                required class="form-control @error('tempat_tinggal') is-invalid @enderror"
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
                                                required class="form-control @error('moda_transportasi') is-invalid @enderror"
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
                                            <input type="number" required class="form-control @error('anak_ke') is-invalid @enderror"
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
                                            <input type="number" required class="form-control @error('no_kip') is-invalid @enderror"
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
                                                required class="form-control @error('tanggal_masuk_sekolah') is-invalid @enderror"
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
                                                required class="form-control @error('sekolah_asal') is-invalid @enderror"
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
                                                required class="form-control @error('no_peserta_ujian_nasional') is-invalid @enderror"
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
                                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                Data Ayah Kandung
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('students.parent.update', $student->id) }}" method="POST"
                                role="form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="sebagai" value="ayah">

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" required class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                id="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap', $ayahSiswa?->nama_lengkap) }}"
                                                name="nama_lengkap">

                                            @error('nama_lengkap')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nik">NIK</label>
                                            <input type="number" required class="form-control @error('nik') is-invalid @enderror"
                                                id="nik" placeholder="NIK" value="{{ old('nik', $ayahSiswa?->nik) }}" name="nik">

                                            @error('nik')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" required class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir', $ayahSiswa?->tanggal_lahir) }}"
                                                name="tanggal_lahir">

                                            @error('tanggal_lahir')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="pendidikan">Pendidikan</label>
                                            <input type="text" required class="form-control @error('pendidikan') is-invalid @enderror"
                                                id="pendidikan" placeholder="Pendidikan" value="{{ old('pendidikan', $ayahSiswa?->pendidikan) }}"
                                                name="pendidikan">

                                            @error('pendidikan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" required class="form-control @error('pekerjaan') is-invalid @enderror"
                                                id="pekerjaan" placeholder="Pekerjaan" value="{{ old('pekerjaan', $ayahSiswa?->nik) }}" name="pekerjaan">

                                            @error('pekerjaan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="penghasilan_bulanan">Penghasilan Bulanan</label>
                                            <input type="text" required class="form-control @error('penghasilan_bulanan') is-invalid @enderror"
                                                id="penghasilan_bulanan" placeholder="Penghasilan Bulanan" value="{{ old('penghasilan_bulanan', $ayahSiswa?->penghasilan_bulanan) }}"
                                                name="penghasilan_bulanan">

                                            @error('penghasilan_bulanan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="berkebutuhan_khusus">Berkebutuhan Khusus</label>
                                            <input type="text" required class="form-control @error('berkebutuhan_khusus') is-invalid @enderror"
                                                id="berkebutuhan_khusus" placeholder="Berkebutuhan Khusus" value="{{ old('berkebutuhan_khusus', $ayahSiswa?->berkebutuhan_khusus) }}" name="berkebutuhan_khusus">

                                            @error('berkebutuhan_khusus')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                                Data Ibu Kandung
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('students.parent.update', $student->id) }}" method="POST"
                                role="form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="sebagai" value="ibu">

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" required class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                id="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap', $ibuSiswa?->nama_lengkap) }}"
                                                name="nama_lengkap">

                                            @error('nama_lengkap')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nik">NIK</label>
                                            <input type="number" required class="form-control @error('nik') is-invalid @enderror"
                                                id="nik" placeholder="NIK" value="{{ old('nik', $ibuSiswa?->nik) }}" name="nik">

                                            @error('nik')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" required class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir', $ibuSiswa?->tanggal_lahir) }}"
                                                name="tanggal_lahir">

                                            @error('tanggal_lahir')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="pendidikan">Pendidikan</label>
                                            <input type="text" required class="form-control @error('pendidikan') is-invalid @enderror"
                                                id="pendidikan" placeholder="Pendidikan" value="{{ old('pendidikan', $ibuSiswa?->pendidikan) }}"
                                                name="pendidikan">

                                            @error('pendidikan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" required class="form-control @error('pekerjaan') is-invalid @enderror"
                                                id="pekerjaan" placeholder="Pekerjaan" value="{{ old('pekerjaan', $ibuSiswa?->nik) }}" name="pekerjaan">

                                            @error('pekerjaan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="penghasilan_bulanan">Penghasilan Bulanan</label>
                                            <input type="text" required class="form-control @error('penghasilan_bulanan') is-invalid @enderror"
                                                id="penghasilan_bulanan" placeholder="Penghasilan Bulanan" value="{{ old('penghasilan_bulanan', $ibuSiswa?->penghasilan_bulanan) }}"
                                                name="penghasilan_bulanan">

                                            @error('penghasilan_bulanan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="berkebutuhan_khusus">Berkebutuhan Khusus</label>
                                            <input type="text" required class="form-control @error('berkebutuhan_khusus') is-invalid @enderror"
                                                id="berkebutuhan_khusus" placeholder="Berkebutuhan Khusus" value="{{ old('berkebutuhan_khusus', $ibuSiswa?->berkebutuhan_khusus) }}" name="berkebutuhan_khusus">

                                            @error('berkebutuhan_khusus')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
                                aria-expanded="false" aria-controls="collapseFour">
                                Data Wali
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('students.parent.update', $student->id) }}" method="POST"
                                role="form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="sebagai" value="wali">

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" required class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                id="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap', $waliSiswa?->nama_lengkap) }}"
                                                name="nama_lengkap">

                                            @error('nama_lengkap')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nik">NIK</label>
                                            <input type="number" required class="form-control @error('nik') is-invalid @enderror"
                                                id="nik" placeholder="NIK" value="{{ old('nik', $waliSiswa?->nik) }}" name="nik">

                                            @error('nik')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" required class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir', $waliSiswa?->tanggal_lahir) }}"
                                                name="tanggal_lahir">

                                            @error('tanggal_lahir')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="pendidikan">Pendidikan</label>
                                            <input type="text" required class="form-control @error('pendidikan') is-invalid @enderror"
                                                id="pendidikan" placeholder="Pendidikan" value="{{ old('pendidikan', $waliSiswa?->pendidikan) }}"
                                                name="pendidikan">

                                            @error('pendidikan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" required class="form-control @error('pekerjaan') is-invalid @enderror"
                                                id="pekerjaan" placeholder="Pekerjaan" value="{{ old('pekerjaan', $waliSiswa?->nik) }}" name="pekerjaan">

                                            @error('pekerjaan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="penghasilan_bulanan">Penghasilan Bulanan</label>
                                            <input type="text" required class="form-control @error('penghasilan_bulanan') is-invalid @enderror"
                                                id="penghasilan_bulanan" placeholder="Penghasilan Bulanan" value="{{ old('penghasilan_bulanan', $waliSiswa?->penghasilan_bulanan) }}"
                                                name="penghasilan_bulanan">

                                            @error('penghasilan_bulanan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="berkebutuhan_khusus">Berkebutuhan Khusus</label>
                                            <input type="text" required class="form-control @error('berkebutuhan_khusus') is-invalid @enderror"
                                                id="berkebutuhan_khusus" placeholder="Berkebutuhan Khusus" value="{{ old('berkebutuhan_khusus', $waliSiswa?->berkebutuhan_khusus) }}" name="berkebutuhan_khusus">

                                            @error('berkebutuhan_khusus')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
                                aria-expanded="false" aria-controls="collapseFive">
                                Kontak
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('students.kontak.update', $student->id) }}" method="POST"
                                role="form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nomor_telepon_rumah">Nomor Telp Rumah</label>
                                            <input type="number"
                                                class="form-control @error('nomor_telepon_rumah') is-invalid @enderror"
                                                id="nomor_telepon_rumah" placeholder="Nomor Telp Rumah"
                                                value="{{ old('nomor_telepon_rumah', $student->dataKontak?->nomor_telepon_rumah) }}"
                                                name="nomor_telepon_rumah">

                                            @error('nomor_telepon_rumah')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nomor_hp">Nomor Telp</label>
                                            <input type="number"
                                                class="form-control @error('nomor_hp') is-invalid @enderror"
                                                id="nomor_hp" placeholder="Nomor Telp"
                                                value="{{ old('nomor_hp', $student->dataKontak?->nomor_hp) }}"
                                                name="nomor_hp">

                                            @error('nomor_hp')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix"
                                aria-expanded="false" aria-controls="collapseSix">
                                Data Periodik
                            </button>
                        </h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('students.periodik.update', $student->id) }}" method="POST"
                                role="form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="tinggi_badan">Tinggi Badan (CM)</label>
                                            <input type="number"
                                                class="form-control @error('tinggi_badan') is-invalid @enderror"
                                                id="tinggi_badan" placeholder="Tinggi Badan (CM)"
                                                value="{{ old('tinggi_badan', $student->dataPeriodik?->tinggi_badan) }}"
                                                name="tinggi_badan">

                                            @error('tinggi_badan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="berat_badan">Berat Badan (KG)</label>
                                            <input type="number"
                                                class="form-control @error('berat_badan') is-invalid @enderror"
                                                id="berat_badan" placeholder="Berat Badan (KG)"
                                                value="{{ old('berat_badan', $student->dataPeriodik?->berat_badan) }}"
                                                name="berat_badan">

                                            @error('berat_badan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="lingkar_kepala">Lingkar Kepala (CM)</label>
                                            <input type="number"
                                                class="form-control @error('lingkar_kepala') is-invalid @enderror"
                                                id="lingkar_kepala" placeholder="Lingkar Kepala (CM)"
                                                value="{{ old('lingkar_kepala', $student->dataPeriodik?->lingkar_kepala) }}"
                                                name="lingkar_kepala">

                                            @error('lingkar_kepala')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="jarak_ke_sekolah">Jarak Tempuh Ke Sekolah (KM)</label>
                                            <input type="number"
                                                class="form-control @error('jarak_ke_sekolah') is-invalid @enderror"
                                                id="jarak_ke_sekolah" placeholder="Jarak Tempuh Ke Sekolah (KM)"
                                                value="{{ old('jarak_ke_sekolah', $student->dataPeriodik?->jarak_ke_sekolah) }}"
                                                name="jarak_ke_sekolah">

                                            @error('jarak_ke_sekolah')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="waktu_tempuh">Waktu Tempuh Ke Sekolah</label>
                                            <input type="text"
                                                class="form-control @error('waktu_tempuh') is-invalid @enderror"
                                                id="waktu_tempuh" placeholder="Waktu Tempuh Ke Sekolah"
                                                value="{{ old('waktu_tempuh', $student->dataPeriodik?->waktu_tempuh) }}"
                                                name="waktu_tempuh">

                                            @error('waktu_tempuh')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="jumlah_saudara_kandung">Jumlah Saudara Kandung</label>
                                            <input type="number"
                                                class="form-control @error('jumlah_saudara_kandung') is-invalid @enderror"
                                                id="jumlah_saudara_kandung" placeholder="Jumlah Saudara Kandung"
                                                value="{{ old('jumlah_saudara_kandung', $student->dataPeriodik?->jumlah_saudara_kandung) }}"
                                                name="jumlah_saudara_kandung">

                                            @error('jumlah_saudara_kandung')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
