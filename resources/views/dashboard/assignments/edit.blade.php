@extends('layouts.app')
@section('title', 'Ubah Data Penugasan Pendidik')

@section('title-header', 'Ubah Data Penugasan Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('assignments.index') }}">Data Penugasan Pendidik</a></li>
    <li class="breadcrumb-item active">Ubah Data Penugasan Pendidik</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Penugasan Pendidik</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('assignments.update', $assignment->id) }}" method="POST" role="form"
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
                                            <option value="{{ $pendidik->id }}" @if (old('pendidik_id', $assignment->pendidik_id) == $pendidik->id) selected @endif>
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
                                    <label for="nomor_surat_tugas">Nomor Surat Penugasan Pendidik</label>
                                    <input type="text" class="form-control @error('nomor_surat_tugas') is-invalid @enderror"
                                        id="nomor_surat_tugas" placeholder="Nomor Surat Penugasan Pendidik" value="{{ old('nomor_surat_tugas', $assignment->nomor_surat_tugas) }}"
                                        name="nomor_surat_tugas">

                                    @error('nomor_surat_tugas')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tanggal_surat_tugas">Tanggal Surat Penugasan Pendidik</label>
                                    <input type="date" class="form-control @error('tanggal_surat_tugas') is-invalid @enderror"
                                        id="tanggal_surat_tugas" placeholder="Tanggal Surat Penugasan Pendidik" value="{{ old('tanggal_surat_tugas', $assignment->tanggal_surat_tugas) }}"
                                        name="tanggal_surat_tugas">

                                    @error('tanggal_surat_tugas')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tmt_tugas">TMT Penugasan Pendidik</label>
                                    <input type="text" class="form-control @error('tmt_tugas') is-invalid @enderror"
                                        id="tmt_tugas" placeholder="TMT Penugasan Pendidik" value="{{ old('tmt_tugas', $assignment->tmt_tugas) }}"
                                        name="tmt_tugas">

                                    @error('tmt_tugas')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="status_sekolah_induk">Status Sekolah Induk Penugasan Pendidik</label>
                                    <input type="text" class="form-control @error('status_sekolah_induk') is-invalid @enderror"
                                        id="status_sekolah_induk" placeholder="Status Sekolah Induk Penugasan Pendidik" value="{{ old('status_sekolah_induk', $assignment->status_sekolah_induk) }}"
                                        name="status_sekolah_induk">

                                    @error('status_sekolah_induk')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('assignments.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
