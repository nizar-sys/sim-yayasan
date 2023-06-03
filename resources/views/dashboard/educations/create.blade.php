@extends('layouts.app')
@section('title', 'Tambah Data Riwayat Pendidikan Formal Pendidik')

@section('title-header', 'Tambah Data Riwayat Pendidikan Formal Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('educations.index') }}">Data Riwayat Pendidikan Formal Pendidik</a></li>
    <li class="breadcrumb-item active">Tambah Data Riwayat Pendidikan Formal Pendidik</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            {{-- show all errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h4 class="alert-heading">Error!</h4>
                    <p class="mb-0">Periksa kembali form isian</p>
                </div>
            @endif
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Riwayat Pendidikan Formal Pendidik</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('educations.store') }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="pendidik_id">Nama Pendidik</label>
                                    <select class="form-control @error('pendidik_id') is-invalid @enderror" id="pendidik_id"
                                        name="pendidik_id">
                                        <option value="" selected>---Nama Pendidik---</option>
                                        @foreach ($dataPendidik as $pendidik)
                                            <option value="{{ $pendidik->id }}"
                                                @if (old('pendidik_id') == $pendidik->id) selected @endif>
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
                                    <label for="bidang_studi">Bidang Studi</label>
                                    <input type="text" class="form-control @error('bidang_studi') is-invalid @enderror"
                                        id="bidang_studi" placeholder="Bidang Studi" value="{{ old('bidang_studi') }}"
                                        name="bidang_studi">

                                    @error('bidang_studi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nis_nim">NIS / NIM</label>
                                    <input type="number" class="form-control @error('nis_nim') is-invalid @enderror"
                                        id="nis_nim" placeholder="NIS / NIM" value="{{ old('nis_nim') }}" name="nis_nim">

                                    @error('nis_nim')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                                    <input type="text"
                                        class="form-control @error('jenjang_pendidikan') is-invalid @enderror"
                                        id="jenjang_pendidikan" placeholder="Jenjang Pendidikan"
                                        value="{{ old('jenjang_pendidikan') }}" name="jenjang_pendidikan">

                                    @error('jenjang_pendidikan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gelar_akademik">Gelar Akademis</label>
                                    <input type="text" class="form-control @error('gelar_akademik') is-invalid @enderror"
                                        id="gelar_akademik" placeholder="Gelar Akademis"
                                        value="{{ old('gelar_akademik') }}" name="gelar_akademik">

                                    @error('gelar_akademik')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="satuan_pendidikan">Satuan Pendidikan</label>
                                    <input type="text"
                                        class="form-control @error('satuan_pendidikan') is-invalid @enderror"
                                        id="satuan_pendidikan" placeholder="Satuan Pendidikan"
                                        value="{{ old('satuan_pendidikan') }}" name="satuan_pendidikan">

                                    @error('satuan_pendidikan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="fakultas">Fakultas</label>
                                    <input type="text" class="form-control @error('fakultas') is-invalid @enderror"
                                        id="fakultas" placeholder="Fakultas" value="{{ old('fakultas') }}"
                                        name="fakultas">

                                    @error('fakultas')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="kependidikan">Kependidikan</label>
                                    <input type="text" class="form-control @error('kependidikan') is-invalid @enderror"
                                        id="kependidikan" placeholder="Kependidikan" value="{{ old('kependidikan') }}"
                                        name="kependidikan">

                                    @error('kependidikan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tahun_masuk">Tahun Masuk</label>
                                    <input type="number" class="form-control @error('tahun_masuk') is-invalid @enderror"
                                        id="tahun_masuk" placeholder="Tahun Masuk" value="{{ old('tahun_masuk') }}"
                                        name="tahun_masuk">

                                    @error('tahun_masuk')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tahun_lulus">Tahun Lulus</label>
                                    <input type="number" class="form-control @error('tahun_lulus') is-invalid @enderror"
                                        id="tahun_lulus" placeholder="Tahun Lulus" value="{{ old('tahun_lulus') }}"
                                        name="tahun_lulus">

                                    @error('tahun_lulus')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="masih_studi">Masih Studi</label>
                                    <select class="form-control @error('masih_studi') is-invalid @enderror"
                                        id="masih_studi" name="masih_studi">
                                        @php
                                            $options = ['ya', 'tidak'];
                                        @endphp
                                        <option value="" selected>---Masih Studi---</option>
                                        @foreach ($options as $masih_studi)
                                            <option value="{{ $masih_studi }}"
                                                @if (old('masih_studi') == $masih_studi) selected @endif>
                                                {{ ucfirst($masih_studi) }}</option>
                                        @endforeach
                                    </select>

                                    @error('masih_studi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="semester">Semester</label>
                                    <input type="number" class="form-control @error('semester') is-invalid @enderror"
                                        id="semester" placeholder="Semester" value="{{ old('semester') }}"
                                        name="semester">

                                    @error('semester')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="rata_rata_nilai_ipk">Nilai Rata Rata / IPK</label>
                                    <input type="number"
                                        class="form-control @error('rata_rata_nilai_ipk') is-invalid @enderror"
                                        id="rata_rata_nilai_ipk" placeholder="Nilai Rata Rata / IPK"
                                        value="{{ old('rata_rata_nilai_ipk') }}" name="rata_rata_nilai_ipk">

                                    @error('rata_rata_nilai_ipk')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{ route('educations.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
