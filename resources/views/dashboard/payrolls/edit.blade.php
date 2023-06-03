@extends('layouts.app')
@section('title', 'Ubah Data Penggajian Pendidik')

@section('title-header', 'Ubah Data Penggajian Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('payrolls.index') }}">Data Penggajian Pendidik</a></li>
    <li class="breadcrumb-item active">Ubah Data Penggajian Pendidik</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Penggajian Pendidik</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('payrolls.update', $payroll->id) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        <input type="hidden" name="pendidik_id" value="{{ $payroll->pendidik_id }}">
                        <input type="hidden" name="tanggal" value="{{ $payroll->tanggal }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="pendidik_id">Nama Pendidik</label>
                                    <select class="form-control @error('pendidik_id') is-invalid @enderror" id="pendidik_id" name="pendidik_id" disabled>
                                        <option value="" selected>---Nama Pendidik---</option>
                                        @foreach ($dataPendidik as $pendidik)
                                            <option value="{{ $pendidik->id }}" @if (old('pendidik_id', $payroll->pendidik_id) == $pendidik->id) selected @endif>
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
                                    <label for="nominal">Nominal Penggajian Pendidik</label>
                                    <input type="number" class="form-control @error('nominal') is-invalid @enderror"
                                        id="nominal" placeholder="Nominal Penggajian Pendidik" value="{{ old('nominal', $payroll->nominal) }}"
                                        name="nominal">

                                    @error('nominal')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tanggal">Tanggal Penggajian Pendidik</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                        id="tanggal" placeholder="Tanggal Penggajian Pendidik" value="{{ old('tanggal', $payroll->tanggal) }}"
                                        name="tanggal" disabled>

                                    @error('tanggal')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('payrolls.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
