@extends('layouts.app')
@section('title', 'Data Riwayat Karir Pendidik')

@section('title-header', 'Data Riwayat Karir Pendidik')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Riwayat Karir Pendidik</li>
@endsection

@section('action_btn')
    <a href="{{route('carriers.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Riwayat Karir Pendidik</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover" id="table-data">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pendidik</th>
                                    <th>Jenjang Pendidikan</th>
                                    <th>Jenis Lembaga</th>
                                    <th>Status Kepegawaian</th>
                                    <th>Jenis PTK</th>
                                    <th>Lembaga Pengangkat</th>
                                    <th>NO SK Kerja</th>
                                    <th>Tanggal SK Kerja</th>
                                    <th>TMT Kerja</th>
                                    <th>TST Kerja</th>
                                    <th>Tempat Kerja</th>
                                    <th>Mapel Diajarkan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carriers as $carrier)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $carrier->pendidik->nama }}</td>
                                        <td>{{ $carrier->jenjang_pendidikan }}</td>
                                        <td>{{ $carrier->jenis_lembaga }}</td>
                                        <td>{{ $carrier->status_kepegawaian }}</td>
                                        <td>{{ $carrier->jenis_ptk }}</td>
                                        <td>{{ $carrier->lembaga_pengangkat }}</td>
                                        <td>{{ $carrier->no_sk_kerja }}</td>
                                        <td>{{ $carrier->tgl_sk_kerja }}</td>
                                        <td>{{ $carrier->tmt_kerja }}</td>
                                        <td>{{ $carrier->tst_kerja }}</td>
                                        <td>{{ $carrier->tempat_kerja }}</td>
                                        <td>{{ $carrier->mapel_diajarkan }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('carriers.edit', $carrier->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $carrier->id }}" action="{{ route('carriers.destroy', $carrier->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$carrier->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                },
                orientation: 'landscape',
            }, ],

        });
    </script>
@endsection
