@extends('layouts.app')
@section('title', 'Data Prestasi Siswa')

@section('title-header', 'Data Prestasi Siswa')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Prestasi Siswa</li>
@endsection


@section('action_btn')
    <a href="{{ route('achievements.create') }}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Prestasi Siswa</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Prestasi</th>
                                    <th>Tingkat Prestasi</th>
                                    <th>Nama Acara</th>
                                    <th>Tahun Acara</th>
                                    <th>Penyelenggara Acara</th>
                                    <th>Peringkat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($achievements as $achievement)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $achievement->student->nama }}</td>
                                        <td>{{ $achievement->jenis }}</td>
                                        <td>{{ $achievement->tingkat }}</td>
                                        <td>{{ $achievement->nama_acara }}</td>
                                        <td>{{ $achievement->tahun }}</td>
                                        <td>{{ $achievement->penyelenggara }}</td>
                                        <td>{{ $achievement->peringkat }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{ route('achievements.edit', $achievement->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $achievement->id }}"
                                                action="{{ route('achievements.destroy', $achievement->id) }}"
                                                class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{ $achievement->id }}')"
                                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
        function deleteForm(id) {
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
