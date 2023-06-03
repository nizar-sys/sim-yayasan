@extends('layouts.app')
@section('title', 'Data Penugasan Pendidik')

@section('title-header', 'Data Penugasan Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Penugasan Pendidik</li>
@endsection

@section('action_btn')
    <a href="{{route('assignments.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Penugasan Pendidik</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pendidik</th>
                                    <th>Nomor Surat Tugas</th>
                                    <th>Tanggal Surat Tugas</th>
                                    <th>TMT Tugas</th>
                                    <th>Status Sekolah Induk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($assignments as $assignment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $assignment->pendidik->nama }}</td>
                                        <td>{{ $assignment->nomor_surat_tugas }}</td>
                                        <td>{{ $assignment->tanggal_surat_tugas }}</td>
                                        <td>{{ $assignment->tmt_tugas }}</td>
                                        <td>{{ $assignment->status_sekolah_induk }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('assignments.edit', $assignment->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $assignment->id }}" action="{{ route('assignments.destroy', $assignment->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$assignment->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        {{ $assignments->links() }}
                                    </th>
                                </tr>
                            </tfoot>
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