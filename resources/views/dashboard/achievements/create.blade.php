@extends('layouts.app')
@section('title', 'Tambah Data Prestasi Siswa')

@section('title-header', 'Tambah Data Prestasi Siswa')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('achievements.index') }}">Data Prestasi Siswa</a></li>
    <li class="breadcrumb-item active">Tambah Data Prestasi Siswa</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Prestasi Siswa</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('achievements.store') }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="siswa_id">Nama Siswa</label>
                                    <select class="form-control @error('siswa_id') is-invalid @enderror" id="siswa_id" name="siswa_id">
                                        <option value="" selected>---Nama Siswa---</option>
                                        @foreach ($dataSiswa as $siswa)
                                            <option value="{{ $siswa->id }}" @if (old('siswa_id') == $siswa->id) selected @endif>
                                                {{ $siswa->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('siswa_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="jenis">Jenis Prestasi</label>
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror"
                                        id="jenis" placeholder="Jenis Prestasi" value="{{ old('jenis') }}"
                                        name="jenis">

                                    @error('jenis')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tingkat">Tingkat Prestasi</label>
                                    <input type="text" class="form-control @error('tingkat') is-invalid @enderror"
                                        id="tingkat" placeholder="Tingkat Prestasi" value="{{ old('tingkat') }}"
                                        name="tingkat">

                                    @error('tingkat')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_acara">Nama Acara</label>
                                    <input type="text" class="form-control @error('nama_acara') is-invalid @enderror"
                                        id="nama_acara" placeholder="Nama Acara" value="{{ old('nama_acara') }}"
                                        name="nama_acara">

                                    @error('nama_acara')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tahun">Tahun Acara</label>
                                    <input type="number" class="form-control @error('tahun') is-invalid @enderror"
                                        id="tahun" placeholder="Tahun Acara" value="{{ old('tahun') }}"
                                        name="tahun">

                                    @error('tahun')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="penyelenggara">Penyelenggara Acara</label>
                                    <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror"
                                        id="penyelenggara" placeholder="Penyelenggara Acara" value="{{ old('penyelenggara') }}"
                                        name="penyelenggara">

                                    @error('penyelenggara')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="peringkat">Peringkat</label>
                                    <input type="text" class="form-control @error('peringkat') is-invalid @enderror"
                                        id="peringkat" placeholder="Peringkat" value="{{ old('peringkat') }}"
                                        name="peringkat">

                                    @error('peringkat')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{ route('achievements.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
