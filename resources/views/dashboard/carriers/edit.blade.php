@extends('layouts.app')
@section('title', 'Ubah Data Riwayat Karir Pendidik')

@section('title-header', 'Ubah Data Riwayat Karir Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('carriers.index') }}">Data Riwayat Karir Pendidik</a></li>
    <li class="breadcrumb-item active">Ubah Data Riwayat Karir Pendidik</li>
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
                    <h5 class="mb-0">Formulir Ubah Data Riwayat Karir Pendidik</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('carriers.update', $carrier->id) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="pendidik_id">Nama Pendidik</label>
                                    <select class="form-control @error('pendidik_id') is-invalid @enderror" id="pendidik_id"
                                        name="pendidik_id">
                                        <option value="" selected>---Nama Pendidik---</option>
                                        @foreach ($dataPendidik as $pendidik)
                                            <option value="{{ $pendidik->id }}"
                                                @if (old('pendidik_id', $carrier->pendidik_id) == $pendidik->id) selected @endif>
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
                                    <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                                    <input type="text" class="form-control @error('jenjang_pendidikan') is-invalid @enderror"
                                        id="jenjang_pendidikan" placeholder="Jenjang Pendidikan" value="{{ old('jenjang_pendidikan', $carrier->jenjang_pendidikan) }}"
                                        name="jenjang_pendidikan">

                                    @error('jenjang_pendidikan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="jenis_lembaga">Jenis Lembaga</label>
                                    <input type="text" class="form-control @error('jenis_lembaga') is-invalid @enderror"
                                        id="jenis_lembaga" placeholder="Jenis Lembaga" value="{{ old('jenis_lembaga', $carrier->jenis_lembaga) }}"
                                        name="jenis_lembaga">

                                    @error('jenis_lembaga')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="status_kepegawaian">Status Kepegawaian</label>
                                    <input type="text" class="form-control @error('status_kepegawaian') is-invalid @enderror"
                                        id="status_kepegawaian" placeholder="Status Kepegawaian" value="{{ old('status_kepegawaian', $carrier->status_kepegawaian) }}"
                                        name="status_kepegawaian">

                                    @error('status_kepegawaian')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="jenis_ptk">Jenis PTK</label>
                                    <input type="text" class="form-control @error('jenis_ptk') is-invalid @enderror"
                                        id="jenis_ptk" placeholder="Jenis PTK" value="{{ old('jenis_ptk', $carrier->jenis_ptk) }}"
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
                                    <label for="lembaga_pengangkat">Lembaga Pengangkat</label>
                                    <input type="text" class="form-control @error('lembaga_pengangkat') is-invalid @enderror"
                                        id="lembaga_pengangkat" placeholder="Lembaga Pengangkat" value="{{ old('lembaga_pengangkat', $carrier->lembaga_pengangkat) }}"
                                        name="lembaga_pengangkat">

                                    @error('lembaga_pengangkat')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="no_sk_kerja">NO SK Kerja</label>
                                    <input type="number" class="form-control @error('no_sk_kerja') is-invalid @enderror"
                                        id="no_sk_kerja" placeholder="NO SK Kerja" value="{{ old('no_sk_kerja', $carrier->no_sk_kerja) }}"
                                        name="no_sk_kerja">

                                    @error('no_sk_kerja')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="tgl_sk_kerja">Tanggal SK Kerja</label>
                                    <input type="date" class="form-control @error('tgl_sk_kerja') is-invalid @enderror"
                                        id="tgl_sk_kerja" placeholder="Tanggal SK Kerja" value="{{ old('tgl_sk_kerja', $carrier->tgl_sk_kerja) }}"
                                        name="tgl_sk_kerja">

                                    @error('tgl_sk_kerja')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tmt_kerja">TMT Kerja</label>
                                    <input type="text" class="form-control @error('tmt_kerja') is-invalid @enderror"
                                        id="tmt_kerja" placeholder="TMT Kerja" value="{{ old('tmt_kerja', $carrier->tmt_kerja) }}"
                                        name="tmt_kerja">

                                    @error('tmt_kerja')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tst_kerja">TST Kerja</label>
                                    <input type="text" class="form-control @error('tst_kerja') is-invalid @enderror"
                                        id="tst_kerja" placeholder="TST Kerja" value="{{ old('tst_kerja', $carrier->tst_kerja) }}"
                                        name="tst_kerja">

                                    @error('tst_kerja')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tempat_kerja">Tempat Kerja</label>
                                    <input type="text" class="form-control @error('tempat_kerja') is-invalid @enderror"
                                        id="tempat_kerja" placeholder="Tempat Kerja" value="{{ old('tempat_kerja', $carrier->tempat_kerja) }}"
                                        name="tempat_kerja">

                                    @error('tempat_kerja')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="mapel_diajarkan">Mapel Diajarkan</label>
                                    <input type="text" class="form-control @error('mapel_diajarkan') is-invalid @enderror"
                                        id="mapel_diajarkan" placeholder="Mapel Diajarkan" value="{{ old('mapel_diajarkan', $carrier->mapel_diajarkan) }}"
                                        name="mapel_diajarkan">

                                    @error('mapel_diajarkan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('carriers.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
