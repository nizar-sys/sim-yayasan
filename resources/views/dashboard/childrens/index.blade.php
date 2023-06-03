@extends('layouts.app')
@section('title', 'Data Anak Pendidik')

@section('title-header', 'Data Anak Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Anak Pendidik</li>
@endsection

@section('action_btn')
    <a href="{{route('childrens.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Anak Pendidik</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover" id="table-data">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Orang Tua Anak</th>
                                    <th>Nama Anak</th>
                                    <th>NISN</th>
                                    <th>Status</th>
                                    <th>Jenjang</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Tahun Masuk Sekolah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($childrens as $children)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $children->pendidik->nama }}</td>
                                        <td>{{ $children->nama_anak }}</td>
                                        <td>{{ $children->nisn }}</td>
                                        <td>{{ $children->status }}</td>
                                        <td>{{ $children->jenjang }}</td>
                                        <td>{{ $children->jenis_kelamin_text }}</td>
                                        <td>{{ $children->tempat_lahir }}, {{ $children->tanggal_lahir }}</td>
                                        <td>{{ $children->tahun_masuk_sekolah }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('childrens.edit', $children->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $children->id }}" action="{{ route('childrens.destroy', $children->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$children->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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

        var tablePengguna = $('#table-data').DataTable({
            processing: false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari Data",
                lengthMenu: "Menampilkan _MENU_ data",
                zeroRecords: "Data tidak ditemukan",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ data)",
                paginate: {
                    previous: '<i class="fa fa-angle-left"></i>',
                    next: "<i class='fa fa-angle-right'></i>",
                }
            },
            dom: 'Blfrtip',
            buttons: [{
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-sm btn-danger',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                },
            }, ],

        });
    </script>
@endsection
