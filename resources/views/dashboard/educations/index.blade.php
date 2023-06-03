@extends('layouts.app')
@section('title', 'Data Riwayat Pendidikan Formal Pendidik')

@section('title-header', 'Data Riwayat Pendidikan Formal Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Riwayat Pendidikan Formal Pendidik</li>
@endsection

@section('action_btn')
    <a href="{{route('educations.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Riwayat Pendidikan Formal Pendidik</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pendidik</th>
                                    <th>NIS / NIM</th>
                                    <th>Bidang Studi</th>
                                    <th>Jenjang Pendidikan</th>
                                    <th>Gelar Akademik</th>
                                    <th>Satuan Pendidikan</th>
                                    <th>Fakultas</th>
                                    <th>Kependidikan</th>
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Lulus</th>
                                    <th>Masih Berlaku</th>
                                    <th>Semester</th>
                                    <th>Rata Rata Nilai / IPK</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($educations as $education)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $education->pendidik->nama }}</td>
                                        <td>{{ $education->nis_nim }}</td>
                                        <td>{{ $education->bidang_studi }}</td>
                                        <td>{{ $education->jenjang_pendidikan }}</td>
                                        <td>{{ $education->gelar_akademik }}</td>
                                        <td>{{ $education->satuan_pendidikan }}</td>
                                        <td>{{ $education->fakultas }}</td>
                                        <td>{{ $education->kependidikan }}</td>
                                        <td>{{ $education->tahun_masuk }}</td>
                                        <td>{{ $education->tahun_lulus }}</td>
                                        <td>{{ $education->masih_studi }}</td>
                                        <td>{{ $education->semester }}</td>
                                        <td>{{ $education->rata_rata_nilai_ipk }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('educations.edit', $education->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $education->id }}" action="{{ route('educations.destroy', $education->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$education->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
