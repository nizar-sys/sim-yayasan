@extends('layouts.app')
@section('title', 'Detail Data Pendidik')

@section('title-header', 'Detail Data Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('educators.index') }}">Data Pendidik</a></li>
    <li class="breadcrumb-item active">Detail Data Pendidik</li>
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

                                <input type="hidden" name="oldImage" id="oldImage" value="{{ $educator->avatar }}">
                                <input type="file" class="d-none" name="image" id="uploadImage"><img
                                    style="cursor: pointer;" src="{{ asset('/uploads/images/' . $educator->user->avatar) }}"
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
                            {{ $educator->name }}
                        </h5>
                        <div class="h5 mt-2">
                            <i class="ni business_briefcase-24 mr-2"></i>{{ $educator->role }}
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
                                Identitas Pendidik
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('educators.update', $educator->id) }}" method="POST" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nama">Nama Lengkap Pendidik</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" placeholder="Nama Lengkap Pendidik"
                                                value="{{ old('nama', $educator->nama) }}" name="nama">

                                            @error('nama')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nik_paspor">NIK / Paspor Pendidik</label>
                                            <input type="number"
                                                class="form-control @error('nik_paspor') is-invalid @enderror"
                                                id="nik_paspor" placeholder="NIK / Paspor Pendidik"
                                                value="{{ old('nik_paspor', $educator->nik_paspor) }}" name="nik_paspor">

                                            @error('nik_paspor')
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
                                                        @if (old('jenis_kelamin', $educator->jenis_kelamin) == $jenis_kelamin) selected @endif>
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
                                            <label for="email">Email Pendidik</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" placeholder="Email Pendidik"
                                                value="{{ old('email', $educator->user->email) }}" name="email">

                                            @error('email')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="tempat_lahir">Tempat Lahir Pendidik</label>
                                            <input type="text"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                id="tempat_lahir" placeholder="Tempat Lahir Pendidik"
                                                value="{{ old('tempat_lahir', $educator->tempat_lahir) }}"
                                                name="tempat_lahir">

                                            @error('tempat_lahir')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="tanggal_lahir">Tanggal Lahir Pendidik</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir" placeholder="Tanggal Lahir Pendidik"
                                                value="{{ old('tanggal_lahir', $educator->tanggal_lahir) }}"
                                                name="tanggal_lahir">

                                            @error('tanggal_lahir')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="nama_ibu_kandung">Nama Ibu Kandung Pendidik</label>
                                            <input type="text"
                                                class="form-control @error('nama_ibu_kandung') is-invalid @enderror"
                                                id="nama_ibu_kandung" placeholder="Nama Ibu Kandung Pendidik"
                                                value="{{ old('nama_ibu_kandung', $educator->nama_ibu_kandung) }}"
                                                name="nama_ibu_kandung">

                                            @error('nama_ibu_kandung')
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
                                Data Pribadi
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('educators.personal.update', $educator->id) }}" method="POST"
                                role="form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="alamat_jalan">Alamat Jalan</label>
                                            <input type="text"
                                                class="form-control @error('alamat_jalan') is-invalid @enderror"
                                                id="alamat_jalan" placeholder="Alamat Jalan"
                                                value="{{ old('alamat_jalan', $educator->dataPribadi?->alamat_jalan) }}"
                                                name="alamat_jalan">

                                            @error('alamat_jalan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="rt">RT</label>
                                            <input type="text" class="form-control @error('rt') is-invalid @enderror"
                                                id="rt" placeholder="RT"
                                                value="{{ old('rt', $educator->dataPribadi?->rt) }}" name="rt">

                                            @error('rt')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="rw">RW</label>
                                            <input type="text" class="form-control @error('rw') is-invalid @enderror"
                                                id="rw" placeholder="RW"
                                                value="{{ old('rw', $educator->dataPribadi?->rw) }}" name="rw">

                                            @error('rw')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="dusun">Dusun</label>
                                            <input type="text"
                                                class="form-control @error('dusun') is-invalid @enderror" id="dusun"
                                                placeholder="Dusun"
                                                value="{{ old('dusun', $educator->dataPribadi?->dusun) }}"
                                                name="dusun">

                                            @error('dusun')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="kelurahan">Kelurahan</label>
                                            <input type="text"
                                                class="form-control @error('kelurahan') is-invalid @enderror"
                                                id="kelurahan" placeholder="Kelurahan"
                                                value="{{ old('kelurahan', $educator->dataPribadi?->kelurahan) }}"
                                                name="kelurahan">

                                            @error('kelurahan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="kecamatan">Kecamatan</label>
                                            <input type="text"
                                                class="form-control @error('kecamatan') is-invalid @enderror"
                                                id="kecamatan" placeholder="Kecamatan"
                                                value="{{ old('kecamatan', $educator->dataPribadi?->kecamatan) }}"
                                                name="kecamatan">

                                            @error('kecamatan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="kode_pos">Kode Pos</label>
                                            <input type="number"
                                                class="form-control @error('kode_pos') is-invalid @enderror"
                                                id="kode_pos" placeholder="Kode Pos"
                                                value="{{ old('kode_pos', $educator->dataPribadi?->kode_pos) }}"
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
                                            <label for="agama">Agama / Kepercayaan</label>
                                            <input type="text"
                                                class="form-control @error('agama') is-invalid @enderror" id="agama"
                                                placeholder="Agama / Kepercayaan"
                                                value="{{ old('agama', $educator->dataPribadi?->agama) }}"
                                                name="agama">

                                            @error('agama')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="npwp">NPWP</label>
                                            <input type="number"
                                                class="form-control @error('npwp') is-invalid @enderror" id="npwp"
                                                placeholder="NPWP"
                                                value="{{ old('npwp', $educator->dataPribadi?->npwp) }}" name="npwp">

                                            @error('npwp')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nama_wajib_pajak">Nama Wajib Pajak</label>
                                            <input type="text"
                                                class="form-control @error('nama_wajib_pajak') is-invalid @enderror"
                                                id="nama_wajib_pajak" placeholder="Nama Wajib Pajak"
                                                value="{{ old('nama_wajib_pajak', $educator->dataPribadi?->nama_wajib_pajak) }}"
                                                name="nama_wajib_pajak">

                                            @error('nama_wajib_pajak')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="kewarganegaraan">Kewarganegaraan</label>
                                            <input type="text"
                                                class="form-control @error('kewarganegaraan') is-invalid @enderror"
                                                id="kewarganegaraan" placeholder="Kewarganegaraan"
                                                value="{{ old('kewarganegaraan', $educator->dataPribadi?->kewarganegaraan) }}"
                                                name="kewarganegaraan">

                                            @error('kewarganegaraan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="status_kawin">Status Perkawinan</label>
                                            <input type="text"
                                                class="form-control @error('status_kawin') is-invalid @enderror"
                                                id="status_kawin" placeholder="Status Perkawinan"
                                                value="{{ old('status_kawin', $educator->dataPribadi?->status_kawin) }}"
                                                name="status_kawin">

                                            @error('status_kawin')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nama_pasangan">Nama Suami / Istri</label>
                                            <input type="text"
                                                class="form-control @error('nama_pasangan') is-invalid @enderror"
                                                id="nama_pasangan" placeholder="Nama Suami / Istri"
                                                value="{{ old('nama_pasangan', $educator->dataPribadi?->nama_pasangan) }}"
                                                name="nama_pasangan">

                                            @error('nama_pasangan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nip_pasangan">NIP Suami / Istri</label>
                                            <input type="number"
                                                class="form-control @error('nip_pasangan') is-invalid @enderror"
                                                id="nip_pasangan" placeholder="NIP Suami / Istri"
                                                value="{{ old('nip_pasangan', $educator->dataPribadi?->nip_pasangan) }}"
                                                name="nip_pasangan">

                                            @error('nip_pasangan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="pekerjaan_pasangan">Pekerjaan Suami / Istri</label>
                                            <input type="text"
                                                class="form-control @error('pekerjaan_pasangan') is-invalid @enderror"
                                                id="pekerjaan_pasangan" placeholder="Pekerjaan Suami / Istri"
                                                value="{{ old('pekerjaan_pasangan', $educator->dataPribadi?->pekerjaan_pasangan) }}"
                                                name="pekerjaan_pasangan">

                                            @error('pekerjaan_pasangan')
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
                                Data Kepegawaian
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('educators.staff.update', $educator->id) }}" method="POST"
                                role="form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="status_kepegawaian">Status Kepegawaian</label>
                                            <input type="text"
                                                class="form-control @error('status_kepegawaian') is-invalid @enderror"
                                                id="status_kepegawaian" placeholder="Status Kepegawaian"
                                                value="{{ old('status_kepegawaian', $educator->dataKepegawaian?->status_kepegawaian) }}"
                                                name="status_kepegawaian">

                                            @error('status_kepegawaian')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="nip">NIP</label>
                                            <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                                id="nip" placeholder="NIP"
                                                value="{{ old('nip', $educator->dataKepegawaian?->nip) }}"
                                                name="nip">

                                            @error('nip')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="niy_nigk">NIY / NIGK</label>
                                            <input type="text"
                                                class="form-control @error('niy_nigk') is-invalid @enderror"
                                                id="niy_nigk" placeholder="NIY / NIGK"
                                                value="{{ old('niy_nigk', $educator->dataKepegawaian?->niy_nigk) }}"
                                                name="niy_nigk">

                                            @error('niy_nigk')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nu_ptk">NUPTK</label>
                                            <input type="text"
                                                class="form-control @error('nu_ptk') is-invalid @enderror" id="nu_ptk"
                                                placeholder="NUPTK"
                                                value="{{ old('nu_ptk', $educator->dataKepegawaian?->nu_ptk) }}"
                                                name="nu_ptk">

                                            @error('nu_ptk')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="jenis_ptk">Jenis PTK</label>
                                            <input type="text"
                                                class="form-control @error('jenis_ptk') is-invalid @enderror"
                                                id="jenis_ptk" placeholder="Jenis PTK"
                                                value="{{ old('jenis_ptk', $educator->dataKepegawaian?->jenis_ptk) }}"
                                                name="jenis_ptk">

                                            @error('jenis_ptk')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="sk_pengangkatan">SK Pengangkatan</label>
                                            <input type="text"
                                                class="form-control @error('sk_pengangkatan') is-invalid @enderror"
                                                id="sk_pengangkatan" placeholder="SK Pengangkatan"
                                                value="{{ old('sk_pengangkatan', $educator->dataKepegawaian?->sk_pengangkatan) }}"
                                                name="sk_pengangkatan">

                                            @error('sk_pengangkatan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="tmt_pengangkatan">TMT Pengangkatan</label>
                                            <input type="text"
                                                class="form-control @error('tmt_pengangkatan') is-invalid @enderror"
                                                id="tmt_pengangkatan" placeholder="TMT Pengangkatan"
                                                value="{{ old('tmt_pengangkatan', $educator->dataKepegawaian?->tmt_pengangkatan) }}"
                                                name="tmt_pengangkatan">

                                            @error('tmt_pengangkatan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="lembaga_pengangkat">Lembaga Pengangkat</label>
                                            <input type="text"
                                                class="form-control @error('lembaga_pengangkat') is-invalid @enderror"
                                                id="lembaga_pengangkat" placeholder="Lembaga Pengangkat"
                                                value="{{ old('lembaga_pengangkat', $educator->dataKepegawaian?->lembaga_pengangkat) }}"
                                                name="lembaga_pengangkat">

                                            @error('lembaga_pengangkat')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="sk_cpns">SK CPNS</label>
                                            <input type="text"
                                                class="form-control @error('sk_cpns') is-invalid @enderror"
                                                id="sk_cpns" placeholder="SK CPNS"
                                                value="{{ old('sk_cpns', $educator->dataKepegawaian?->sk_cpns) }}"
                                                name="sk_cpns">

                                            @error('sk_cpns')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="tmt_cpns">TMT CPNS</label>
                                            <input type="text"
                                                class="form-control @error('tmt_cpns') is-invalid @enderror"
                                                id="tmt_cpns" placeholder="TMT CPNS"
                                                value="{{ old('tmt_cpns', $educator->dataKepegawaian?->tmt_cpns) }}"
                                                name="tmt_cpns">

                                            @error('tmt_cpns')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="pangkat_golongan">Pangkat / Golongan</label>
                                            <input type="text"
                                                class="form-control @error('pangkat_golongan') is-invalid @enderror"
                                                id="pangkat_golongan" placeholder="Pangkat / Golongan"
                                                value="{{ old('pangkat_golongan', $educator->dataKepegawaian?->pangkat_golongan) }}"
                                                name="pangkat_golongan">

                                            @error('pangkat_golongan')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="sumber_gaji">Sumber Gaji</label>
                                            <input type="text"
                                                class="form-control @error('sumber_gaji') is-invalid @enderror"
                                                id="sumber_gaji" placeholder="Sumber Gaji"
                                                value="{{ old('sumber_gaji', $educator->dataKepegawaian?->sumber_gaji) }}"
                                                name="sumber_gaji">

                                            @error('sumber_gaji')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="kartu_pegawai">Kartu Pegawai</label>
                                            <input type="text"
                                                class="form-control @error('kartu_pegawai') is-invalid @enderror"
                                                id="kartu_pegawai" placeholder="Kartu Pegawai"
                                                value="{{ old('kartu_pegawai', $educator->dataKepegawaian?->kartu_pegawai) }}"
                                                name="kartu_pegawai">

                                            @error('kartu_pegawai')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="kartu_pasangan">Kartu Pasangan</label>
                                            <input type="text"
                                                class="form-control @error('kartu_pasangan') is-invalid @enderror"
                                                id="kartu_pasangan" placeholder="Kartu Pasangan"
                                                value="{{ old('kartu_pasangan', $educator->dataKepegawaian?->kartu_pasangan) }}"
                                                name="kartu_pasangan">

                                            @error('kartu_pasangan')
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
                                Kontak
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('educators.kontak.update', $educator->id) }}" method="POST"
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
                                                value="{{ old('nomor_telepon_rumah', $educator->dataKontak?->nomor_telepon_rumah) }}"
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
                                                value="{{ old('nomor_hp', $educator->dataKontak?->nomor_hp) }}"
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
            </div>
        </div>
    </div>
@endsection
