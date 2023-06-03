@extends('layouts.app')
@section('title', 'Ubah Data Riwayat Sertifikasi Pendidik')

@section('title-header', 'Ubah Data Riwayat Sertifikasi Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('certificates.index') }}">Data Riwayat Sertifikasi Pendidik</a></li>
    <li class="breadcrumb-item active">Ubah Data Riwayat Sertifikasi Pendidik</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Riwayat Sertifikasi Pendidik</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('certificates.update', $certificate->id) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="pendidik_id">Nama Pendidik</label>
                                    <select class="form-control @error('pendidik_id') is-invalid @enderror" id="pendidik_id" name="pendidik_id">
                                        <option value="" selected>---Nama Pendidik---</option>
                                        @foreach ($dataPendidik as $pendidik)
                                            <option value="{{ $pendidik->id }}" @if (old('pendidik_id', $certificate->pendidik_id) == $pendidik->id) selected @endif>
                                                {{ $pendidik->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('pendidik_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nomor_sertifikasi">Nomor Riwayat Sertifikasi Pendidik</label>
                                    <input type="text" class="form-control @error('nomor_sertifikasi') is-invalid @enderror"
                                        id="nomor_sertifikasi" placeholder="Nomor Riwayat Sertifikasi Pendidik" value="{{ old('nomor_sertifikasi', $certificate->nomor_sertifikasi) }}"
                                        name="nomor_sertifikasi">

                                    @error('nomor_sertifikasi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nomor_peserta">Nomor Peserta Sertifikasi Pendidik</label>
                                    <input type="text" class="form-control @error('nomor_peserta') is-invalid @enderror"
                                        id="nomor_peserta" placeholder="Nomor Peserta Sertifikasi Pendidik" value="{{ old('nomor_peserta', $certificate->nomor_peserta) }}"
                                        name="nomor_peserta">

                                    @error('nomor_peserta')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="jenis_sertifikasi">Jenis Riwayat Sertifikasi Pendidik</label>
                                    <input type="text" class="form-control @error('jenis_sertifikasi') is-invalid @enderror"
                                        id="jenis_sertifikasi" placeholder="Jenis Riwayat Sertifikasi Pendidik" value="{{ old('jenis_sertifikasi', $certificate->jenis_sertifikasi) }}"
                                        name="jenis_sertifikasi">

                                    @error('jenis_sertifikasi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="bidang_studi">Bidang Studi Riwayat Sertifikasi Pendidik</label>
                                    <input type="text" class="form-control @error('bidang_studi') is-invalid @enderror"
                                        id="bidang_studi" placeholder="Bidang Studi Riwayat Sertifikasi Pendidik" value="{{ old('bidang_studi', $certificate->bidang_studi) }}"
                                        name="bidang_studi">

                                    @error('bidang_studi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="tahun_sertifikasi">Tahun Riwayat Sertifikasi Pendidik</label>
                                    <input type="number" class="form-control @error('tahun_sertifikasi') is-invalid @enderror"
                                        id="tahun_sertifikasi" placeholder="Tahun Riwayat Sertifikasi Pendidik" value="{{ old('tahun_sertifikasi', $certificate->tahun_sertifikasi) }}"
                                        name="tahun_sertifikasi">

                                    @error('tahun_sertifikasi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('certificates.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
