<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Diri: {{ $pendidik->nama }}</title>
    <style>
        * {
            line-height: 1.625;
            font-family: Arial, Helvetica, sans-serif;
        }

        h1 {
            text-align: center;
            font-size: 0.9rem;
            margin-bottom: 1.2rem;
        }

        p {
            text-indent: 50px;
        }

        th {
            text-align: left;
            white-space: nowrap;
            font-size: 0.8rem;
        }

        tr th:nth-child(2) {
            padding: 0 1rem;
        }

        p,
        table,
        span {
            font-size: 14px
        }

        span {
            float: right;
        }
    </style>
</head>

<body>
    <h1>DATA DIRI PENDIDIK <br>YAYASAN PRAWITAMA SMK WIKRAMA BOGOR</h1>
    <table>
        <tbody>
            <tr>
                <th>Identitas Pendidik</th>
            </tr>
            <hr>
            <tr>
                <th>NIS / Paspor</th>
                <th>:</th>
                <td>{{ $pendidik->nik_paspor ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <th>:</th>
                <td>{{ $pendidik->nama ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin </th>
                <th>:</th>
                <td>{{ $pendidik->jenis_kelamin_formatted ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <th>:</th>
                <td>{{ $pendidik->dataPribadi->agama ?? 'Belum Diisi' }}</td>
            </tr>

            <tr>
                <th>TTL</th>
                <th>:</th>
                <td>{{ $pendidik->tempat_lahir ?? 'Belum Diisi' }},
                    {{ $pendidik->tanggal_lahir ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <th>:</th>
                <td>{{ $pendidik->dataPribadi->alamat_jalan ?? 'Belum Diisi' }},
                    {{ $pendidik->dataPribadi->dusun ?? 'Belum Diisi' }} RT
                    {{ $pendidik->dataPribadi->rt ?? 'Belum Diisi' }} RW
                    {{ $pendidik->dataPribadi->rw ?? 'Belum Diisi' }}, Kel.
                    {{ $pendidik->dataPribadi->kelurahan ?? 'Belum Diisi' }},
                    {{ $pendidik->dataPribadi->kecamatan ?? 'Belum Diisi' }}
                    {{ $pendidik->dataPribadi->kode_pos ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <th>:</th>
                <td>{{ $pendidik->dataKontak->nomor_hp ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <th>:</th>
                <td>{{ $pendidik->user->email ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>No. Kartu Keluarga</th>
                <th>:</th>
                <td>{{ $pendidik->dataPribadi->no_kk ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Nama Ibu</th>
                <th>:</th>
                <td>{{ $pendidik->nama_ibu_kandung ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Data Pribadi Pendidik</th>
            </tr>
            <hr>

            <tr>
                <th>NPWP</th>
                <th>:</th>
                <td>{{ $pendidik->dataPribadi->npwp ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Nama Wajib Pajak</th>
                <th>:</th>
                <td>{{ $pendidik->dataPribadi->nama_wajib_pajak ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Kewarganegaraan</th>
                <th>:</th>
                <td>{{ $pendidik->dataPribadi->kewarganegaraan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Status Perkawinan</th>
                <th>:</th>
                <td>{{ $pendidik->dataPribadi->status_kawin ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Nama Suami / Istri</th>
                <th>:</th>
                <td>{{ $pendidik->dataPribadi->nama_pasangan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NIP Suami / Istri</th>
                <th>:</th>
                <td>{{ $pendidik->dataPribadi->nip_pasangan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Pekerjaan Suami / Istri</th>
                <th>:</th>
                <td>{{ $pendidik->dataPribadi->pekerjaan_pasangan ?? 'Belum Diisi' }}</td>
            </tr>

            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Data Kepegawaian Pendidik</th>
            </tr>
            <hr>

            <tr>
                <th>Status Kepegawaian</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->status_kepegawaian ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NIY / NIGK</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->niy_nigk ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NUPTK</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->nuptk ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Jenis PTK</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->jenis_ptk ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>SK Pengangkatan</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->sk_pengangkatan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>TMT Pengangkatan</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->tmt_pengangkatan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Lembaga Pengangkat</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->lembaga_pengangkat ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>SK CPNS</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->sk_cpns ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>TMT CPNS</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->tmt_cpns ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Pangkat / Golongan</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->pangkat_golongan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Sumber Gaji</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->sumber_gaji ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Kartu Pegawai</th>
                <th>:</th>
                <td>{{ $pendidik->dataKepegawaian->kartu_pegawai ?? 'Belum Diisi' }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
