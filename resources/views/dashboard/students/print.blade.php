<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Diri: {{ $siswa->nama }}</title>
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

        @media print {
            .pagebreak {
                page-break-before: always;
            }

            /* page-break-after works, as well */
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
    <h1>DATA DIRI SISWA <br>YAYASAN PRAWITAMA SMK WIKRAMA BOGOR</h1>
    <table>
        <tbody>
            <tr>
                <th>Identitas Siswa</th>
            </tr>
            <hr>
            <tr>
                <th>NIS</th>
                <th>:</th>
                <td>{{ $siswa->nis ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NISN</th>
                <th>:</th>
                <td>{{ $siswa->nisn ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <th>:</th>
                <td>{{ $siswa->nik ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NO Kartu Keluarga</th>
                <th>:</th>
                <td>{{ $siswa->no_kk ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NO Telepon</th>
                <th>:</th>
                <td>{{ $siswa->dataKontak->nomor_hp ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <th>:</th>
                <td>{{ $siswa->jenis_kelamin_label ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <th>:</th>
                <td>{{ $siswa->tempat_lahir ?? 'Belum Diisi' }}, {{ $siswa->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>NO Registrasi Akta Lahir</th>
                <th>:</th>
                <td>{{ $siswa->no_registrasi_akta_lahir ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <th>:</th>
                <td>{{ $siswa->agama ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Kewarganegaraan</th>
                <th>:</th>
                <td>{{ $siswa->kewarganegaraan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Berkebutuhan Khusus</th>
                <th>:</th>
                <td>{{ $siswa->kebutuhan_khusus ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <th>:</th>
                <td>{{ $siswa->alamat ?? 'Belum Diisi' }},
                    {{ $siswa->dusun ?? 'Belum Diisi' }} RT
                    {{ $siswa->rt ?? 'Belum Diisi' }} RW
                    {{ $siswa->rw ?? 'Belum Diisi' }}, Kel.
                    {{ $siswa->kelurahan ?? 'Belum Diisi' }},
                    {{ $siswa->kecamatan ?? 'Belum Diisi' }}
                    {{ $siswa->kode_pos ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Tempat Tinggal</th>
                <th>:</th>
                <td>{{ $siswa->tempat_tinggal ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Moda Transportasi</th>
                <th>:</th>
                <td>{{ $siswa->moda_transportasi ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Anak Ke</th>
                <th>:</th>
                <td>{{ $siswa->anak_ke ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NO KIP</th>
                <th>:</th>
                <td>{{ $siswa->no_kip ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Tanggal Masuk Sekolah</th>
                <th>:</th>
                <td>{{ $siswa->tanggal_masuk_sekolah ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Sekolah Asal</th>
                <th>:</th>
                <td>{{ $siswa->sekolah_asal ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NO Peserta Ujian Nasional</th>
                <th>:</th>
                <td>{{ $siswa->no_peserta_ujian_nasional ?? 'Belum Diisi' }}</td>
            </tr>

            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>

            <tr>
                <th>Data Ayah Kandung</th>
            </tr>
            <hr>

            <tr>
                <th>Nama</th>
                <th>:</th>
                <td>{{ $ayahSiswa->nama_lengkap ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <th>:</th>
                <td>{{ $ayahSiswa->nik ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <th>:</th>
                <td>{{ $ayahSiswa->tanggal_lahir ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Pendidikan</th>
                <th>:</th>
                <td>{{ $ayahSiswa->pendidikan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <th>:</th>
                <td>{{ $ayahSiswa->pekerjaan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Penghasilan Bulanan</th>
                <th>:</th>
                <td>{{ $ayahSiswa->penghasilan_bulanan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Berkebutuhan Khusus</th>
                <th>:</th>
                <td>{{ $ayahSiswa->berkebutuhan_khusus ?? 'Belum Diisi' }}</td>
            </tr>

            <div class="pagebreak"></div>

            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>


            <tr>
                <th>Data Ibu Kandung</th>
            </tr>
            <hr>

            <tr>
                <th>Nama</th>
                <th>:</th>
                <td>{{ $ibuSiswa->nama_lengkap ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <th>:</th>
                <td>{{ $ibuSiswa->nik ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <th>:</th>
                <td>{{ $ibuSiswa->tanggal_lahir ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Pendidikan</th>
                <th>:</th>
                <td>{{ $ibuSiswa->pendidikan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <th>:</th>
                <td>{{ $ibuSiswa->pekerjaan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Penghasilan Bulanan</th>
                <th>:</th>
                <td>{{ $ibuSiswa->penghasilan_bulanan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Berkebutuhan Khusus</th>
                <th>:</th>
                <td>{{ $ibuSiswa->berkebutuhan_khusus ?? 'Belum Diisi' }}</td>
            </tr>

            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>


            <tr>
                <th>Data Wali Siswa</th>
            </tr>
            <hr>

            <tr>
                <th>Nama</th>
                <th>:</th>
                <td>{{ $waliSiswa->nama_lengkap ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <th>:</th>
                <td>{{ $waliSiswa->nik ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <th>:</th>
                <td>{{ $waliSiswa->tanggal_lahir ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Pendidikan</th>
                <th>:</th>
                <td>{{ $waliSiswa->pendidikan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <th>:</th>
                <td>{{ $waliSiswa->pekerjaan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Penghasilan Bulanan</th>
                <th>:</th>
                <td>{{ $waliSiswa->penghasilan_bulanan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Berkebutuhan Khusus</th>
                <th>:</th>
                <td>{{ $waliSiswa->berkebutuhan_khusus ?? 'Belum Diisi' }}</td>
            </tr>

            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>


            <tr>
                <th>Data Periodik Siswa</th>
            </tr>
            <hr>

            <tr>
                <th>Tinggi Badan (CM)</th>
                <th>:</th>
                <td>{{ $siswa->dataPeriodik->tinggi_badan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Berat Badan (KG)</th>
                <th>:</th>
                <td>{{ $siswa->dataPeriodik->berat_badan ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Lingkar Kepala (CM)</th>
                <th>:</th>
                <td>{{ $siswa->dataPeriodik->lingkar_kepala ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Jarak Ke Sekolah (KM)</th>
                <th>:</th>
                <td>{{ $siswa->dataPeriodik->jarak_ke_sekolah ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Waktu Tempuh</th>
                <th>:</th>
                <td>{{ $siswa->dataPeriodik->waktu_tempuh ?? 'Belum Diisi' }}</td>
            </tr>
            <tr>
                <th>Jumlah Saudara Kandung</th>
                <th>:</th>
                <td>{{ $siswa->dataPeriodik->jumlah_saudara_kandung ?? 'Belum Diisi' }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
