@extends('layouts.app')
@section('title', 'Ubah Data Anak Pendidik')

@section('title-header', 'Ubah Data Anak Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('childrens.index') }}">Data Anak Pendidik</a></li>
    <li class="breadcrumb-item active">Ubah Data Anak Pendidik</li>
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
                    <h5 class="mb-0">Formulir Ubah Data Anak Pendidik</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('childrens.update', $children->id) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="pendidik_id">Nama Orang Tua</label>
                                    <select class="form-control @error('pendidik_id') is-invalid @enderror" id="pendidik_id"
                                        name="pendidik_id">
                                        <option value="" selected>---Nama Orang Tua---</option>
                                        @foreach ($dataPendidik as $pendidik)
                                            <option value="{{ $pendidik->id }}"
                                                @if (old('pendidik_id', $children->pendidik_id) == $pendidik->id) selected @endif>
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
                                    <label for="nama_anak">Nama Anak</label>
                                    <input type="text" class="form-control @error('nama_anak') is-invalid @enderror"
                                        id="nama_anak" placeholder="Nama Anak" value="{{ old('nama_anak', $children->nama_anak) }}"
                                        name="nama_anak">

                                    @error('nama_anak')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control @error('status') is-invalid @enderror"
                                        id="status" placeholder="Status" value="{{ old('status', $children->status) }}"
                                        name="status">

                                    @error('status')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                                        @php
                                            $jk = ['l', 'p'];
                                        @endphp
                                        <option value="" selected>---Jenis Kelamin---</option>
                                        @foreach ($jk as $jenis_kelamin)
                                            <option value="{{ $jenis_kelamin }}" @if (old('jenis_kelamin', $children->jenis_kelamin) == $jenis_kelamin) selected @endif>
                                                {{ $jenis_kelamin == 'l' ? 'Laki-laki' : "Perempuan" }}</option>
                                        @endforeach
                                    </select>

                                    @error('jenis_kelamin')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        id="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir', $children->tempat_lahir) }}"
                                        name="tempat_lahir">

                                    @error('tempat_lahir')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir', $children->tanggal_lahir) }}"
                                        name="tanggal_lahir">

                                    @error('tanggal_lahir')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="tahun_masuk_sekolah">Tahun Masuk Sekolah</label>
                                    <input type="number" class="form-control @error('tahun_masuk_sekolah') is-invalid @enderror"
                                        id="tahun_masuk_sekolah" placeholder="Nama Anak" value="{{ old('tahun_masuk_sekolah', $children->tahun_masuk_sekolah) }}"
                                        name="tahun_masuk_sekolah">

                                    @error('tahun_masuk_sekolah')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="jenjang">Jenjang</label>
                                    <input type="text" class="form-control @error('jenjang') is-invalid @enderror"
                                        id="jenjang" placeholder="Jenjang" value="{{ old('jenjang', $children->jenjang) }}"
                                        name="jenjang">

                                    @error('jenjang')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nisn">NISN</label>
                                    <input type="number" class="form-control @error('nisn') is-invalid @enderror"
                                        id="nisn" placeholder="NISN" value="{{ old('nisn', $children->nisn) }}"
                                        name="nisn">

                                    @error('nisn')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('childrens.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
