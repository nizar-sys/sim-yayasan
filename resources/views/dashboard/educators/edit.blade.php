@extends('layouts.app')
@section('title', 'Ubah Data Pendidik')

@section('title-header', 'Ubah Data Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('educators.index') }}">Data Pendidik</a></li>
    <li class="breadcrumb-item active">Ubah Data Pendidik</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Pendidik</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('educators.update', $educator->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama Lengkap Pendidik</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Nama Lengkap Pendidik" value="{{ old('nama', $educator->nama) }}" name="nama">

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nik_paspor">NIK / Paspor Pendidik</label>
                                    <input type="number" class="form-control @error('nik_paspor') is-invalid @enderror" id="nik_paspor"
                                        placeholder="NIK / Paspor Pendidik" value="{{ old('nik_paspor', $educator->nik_paspor) }}" name="nik_paspor">

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
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                                        @php
                                            $roles = ['l', 'p'];
                                        @endphp
                                        <option value="" selected>---Jenis Kelamin---</option>
                                        @foreach ($roles as $jenis_kelamin)
                                            <option value="{{ $jenis_kelamin }}" @if (old('jenis_kelamin', $educator->jenis_kelamin) == $jenis_kelamin) selected @endif>
                                                {{ $jenis_kelamin == 'l' ? 'Laki-laki' : "Perempuan" }}</option>
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
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Email Pendidik" value="{{ old('email', $educator->email) }}" name="email">

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
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                                        placeholder="Tempat Lahir Pendidik" value="{{ old('tempat_lahir', $educator->tempat_lahir) }}" name="tempat_lahir">

                                    @error('tempat_lahir')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tanggal_lahir">Tanggal Lahir Pendidik</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                                        placeholder="Tanggal Lahir Pendidik" value="{{ old('tanggal_lahir', $educator->tanggal_lahir) }}" name="tanggal_lahir">

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
                                    <input type="text" class="form-control @error('nama_ibu_kandung') is-invalid @enderror" id="nama_ibu_kandung"
                                        placeholder="Nama Ibu Kandung Pendidik" value="{{ old('nama_ibu_kandung', $educator->nama_ibu_kandung) }}" name="nama_ibu_kandung">

                                    @error('nama_ibu_kandung')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{route('educators.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
