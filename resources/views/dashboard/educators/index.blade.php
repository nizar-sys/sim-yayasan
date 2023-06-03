@extends('layouts.app')
@section('title', 'Data Pendidik')

@section('title-header', 'Data Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Pendidik</li>
@endsection

@section('action_btn')
    <a href="{{route('educators.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Pendidik</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK / Paspor</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Nama Ibu Kandung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($educators as $pendidik)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pendidik->nama }}</td>
                                        <td>{{ $pendidik->nik_paspor }}</td>
                                        <td>{{ $pendidik->jenis_kelamin_formatted }}</td>
                                        <td>{{ $pendidik->tempat_lahir }}, {{ $pendidik->tanggal_lahir_formatted }}</td>
                                        <td>{{ $pendidik->nama_ibu_kandung }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('educators.show', $pendidik->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('educators.edit', $pendidik->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $pendidik->id }}" action="{{ route('educators.destroy', $pendidik->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$pendidik->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
                                        {{ $educators->links() }}
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
