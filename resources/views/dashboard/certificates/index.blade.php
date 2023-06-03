@extends('layouts.app')
@section('title', 'Data Riwayat Sertifikat Pendidik')

@section('title-header', 'Data Riwayat Sertifikat Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Riwayat Sertifikat Pendidik</li>
@endsection

@section('action_btn')
    <a href="{{route('certificates.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Riwayat Sertifikat Pendidik</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pendidik</th>
                                    <th>Nomor Peserta</th>
                                    <th>Jenis Sertifikasi</th>
                                    <th>Nomor Sertifikasi</th>
                                    <th>Tahun Sertifikasi</th>
                                    <th>Bidang Studi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($certificates as $certificate)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $certificate->pendidik->nama }}</td>
                                        <td>{{ $certificate->nomor_peserta }}</td>
                                        <td>{{ $certificate->jenis_sertifikasi }}</td>
                                        <td>{{ $certificate->nomor_sertifikasi }}</td>
                                        <td>{{ $certificate->tahun_sertifikasi }}</td>
                                        <td>{{ $certificate->bidang_studi }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('certificates.edit', $certificate->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $certificate->id }}" action="{{ route('certificates.destroy', $certificate->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$certificate->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteForm(id){
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            })
        }
    </script>
@endsection
