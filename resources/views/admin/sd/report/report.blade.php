<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LAPORAN BULAN {{ $bulan }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
        @page {
            size: A4 landscape
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .text-center {
            text-align: center;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;

            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-lq7p {
            background-color: #c0c0c0;
            border-color: #000000;
            font-size: small;
            text-align: center;
            font-weight: bold;
            vertical-align: center
        }

        .tg .tg-tu9x {
            background-color: #c0c0c0;
            border-color: #000000;
            font-size: xx-small;
            font-weight: bold;
            text-align: center;
            vertical-align: center
        }

        .tg .tg-m4qq {
            background-color: #c0c0c0;
            border-color: #000000;
            font-size: xx-small;
            font-weight: bold;
            text-align: center;
            vertical-align: center
        }

        .tg .tg-qr5b {
            border-color: #000000;
            font-size: xx-small;
            /* text-align: center; */
            vertical-align: top
        }

        .header-title {
            font-size: small;

            text-decoration: underline;
        }

        .table-sekolah {
            font-size: small;

            font-weight: bold;
        }

        .kop {
            font-size: medium;

            font-weight: bold;
        }

        .tg .tg-need {
            background-color: #c0c0c0;
            border-color: #000000;
            font-size: small;
            font-weight: bold;
            text-align: center;
            vertical-align: center
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            table {
                page-break-inside: auto
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto
            }

            .page-break {
                page-break-after: always;
            }
        }

        .signature {
            margin-left: 80%;
            font-size: small;
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4 landscape">

    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">
        <div class="kop text-center">
            <h4 class="text-uppercase">LAPORAN BULANAN <br>{{ $schools->nama_sekolah }}</h4>
        </div>
        <h2 class="kop text-uppercase">BULAN : {{ $bulan }}</h2>
        <h3 class="kop text-uppercase">I. DATA SEKOLAH</h3>
        <table class="table-sekolah">
            <tr>
                <td>1</td>
                <td>NAMA SEKOLAH</td>
                <td>:</td>
                <td class="text-uppercase">{{ $schools->nama_sekolah }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>NSS</td>
                <td>:</td>
                <td>{{ $schools->nss }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>NPSN</td>
                <td>:</td>
                <td>{{ $schools->npsn }}</td>
            </tr>
            <tr>
                <td>4</td>
                <td>STATUS SEKOLAH</td>
                <td>:</td>
                <td>{{ $schools->status_sekolah }}</td>
            </tr>
            <tr>
                <td>5</td>
                <td>TAHUN BERDIRI</td>
                <td>:</td>
                <td>{{ $schools->tahun_berdiri }}</td>
            </tr>
            <tr>
                <td>6</td>
                <td>AKREDITASI</td>
                <td>:</td>
                <td>{{ $schools->akreditasi }}</td>
                <td>Nilai : {{ $schools->nilai_akreditasi }}</td>
            </tr>
            <tr>
                <td>7</td>
                <td>ALAMAT SEKOLAH</td>
                <td>:</td>
                <td>{{ $schools->alamat_sekolah }}</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KECAMATAN</td>
                <td>:</td>
                <td>{{ $schools->district->nama }}</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KELURAHAN</td>
                <td>:</td>
                <td>{{ $schools->village->nama }}</td>
            </tr>
            <tr>
                <td>8</td>
                <td>TELP (HP) KEPSEK</td>
                <td>:</td>
                <td>{{ $schools->hp_kepala_sekolah }}</td>
            </tr>
            <tr>
                <td>9</td>
                <td>EMAIL SEKOLAH</td>
                <td>:</td>
                <td>{{ $schools->email }}</td>
            </tr>
            <tr>
                <td>10</td>
                <td>KURIKULUM</td>
                <td>:</td>
                <td>{{ $schools->kurikulum }}</td>
            </tr>
        </table>

        <h3 class="kop text-uppercase">II. ANALISIS KEBUTUHAN GURU</h3>
        <table class="tg" style="width: 100%">
            <thead>
                <tr>
                    <th class="tg-need">NO</th>
                    <th class="tg-need">MAPEL</th>
                    <th class="tg-need">ROMBEL SISWA/BK</th>
                    <th class="tg-need">JUMLAH JAM PEROMBEL</th>
                    <th class="tg-need" style="background-color: #c0c0c0;">TOTAL JAM</th>
                    <th class="tg-need">JUMLAH GURU</th>
                    <th class="tg-need">RATA-RATA JAM PERMINGGU</th>
                    <th class="tg-need">STATUS KEPEGAWAIAN</th>
                    <th class="tg-need">KETERANGAN</th>
                    <th class="tg-need">{{ $schools->kurikulum }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($needs as $n)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $n->mapel }}</td>
                    <td class="text-center">{{ $n->rombel }}</td>
                    <td class="text-center">{{ $n->jam_rombel }} Jam</td>
                    <td class="text-center" style="background-color: #c0c0c0;">{{ $n->rombel*$n->jam_rombel }}</td>
                    <td class="text-center">{{ $n->jumlah_guru }}</td>
                    <td class="text-center">{{ $n->jam_perminggu }}</td>
                    <td class="text-center">{{ $n->status_kepegawaian }}</td>
                    <td>{{ $n->keterangan }}</td>
                    <td>{{ $n->rombel }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="kop text-uppercase text-center">
                        LAPORAN ANALISIS KEBUTUHAN GURU {{ $bulan }} BELUM DI GENERATE</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="page-break"></div>


        {{-- <h2 class="kop text-center">DATA TENAGA PENDIDIK</h2> --}}
        <h3 class="kop text-uppercase">III. DATA TENAGA PENDIDIK</h3>
        <table class="tg" style="width: 100%">
            <thead>
                <tr>
                    <th class="tg-tu9x" rowspan="2">NO</th>
                    <th class="tg-tu9x" rowspan="2">NAMA</th>
                    <th class="tg-tu9x" rowspan="2">NUPTK</th>
                    <th class="tg-tu9x" rowspan="2">NIP/NIPGB</th>
                    <th class="tg-tu9x" rowspan="2">GOL</th>
                    <th class="tg-tu9x" rowspan="2">TMT GOL</th>
                    <th class="tg-tu9x" rowspan="2">TMT DI SEKOLAH</th>
                    <th class="tg-tu9x" rowspan="2">JABATAN</th>
                    <th class="tg-tu9x" rowspan="2">TMT JABATAN</th>
                    <th class="tg-tu9x" rowspan="2">TEMPAT LAHIR</th>
                    <th class="tg-tu9x" rowspan="2">TANGGAL LAHIR</th>
                    <th class="tg-tu9x" rowspan="2">ALAMAT RUMAH</th>
                    <th class="tg-tu9x" rowspan="2">TMT SEBAGAI GURU</th>
                    <th class="tg-m4qq" rowspan="2">MAPEL/JABATAN</th>
                    <th class="tg-m4qq" rowspan="2">SERTIFIKASI</th>
                    <th class="tg-m4qq" colspan="2">JK</th>
                    <th class="tg-m4qq" colspan="4">STATUS</th>
                    <th class="tg-m4qq" colspan="7">PENDIDIKAN</th>
                    <th class="tg-m4qq" rowspan="2">JURUSAN</th>
                    <th class="tg-m4qq" rowspan="2">JJM</th>
                </tr>
                <tr>
                    <td class="tg-m4qq">L</td>
                    <td class="tg-m4qq">P</td>
                    <td class="tg-m4qq">PNS</td>
                    <td class="tg-m4qq">GBD</td>
                    <td class="tg-m4qq">GTT</td>
                    <td class="tg-m4qq">GTY</td>
                    <td class="tg-m4qq">SMA</td>
                    <td class="tg-m4qq">D1</td>
                    <td class="tg-m4qq">D2</td>
                    <td class="tg-m4qq">D3</td>
                    <td class="tg-m4qq">S1</td>
                    <td class="tg-m4qq">S2</td>
                    <td class="tg-tu9x">S3</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $t)
                <tr>
                    <td class="tg-qr5b">{{ $loop->iteration }}</td>
                    <td class="tg-qr5b">{{ $t->nama }}</td>
                    <td class="tg-qr5b">{{ $t->nuptk }}</td>
                    <td class="tg-qr5b">{{ $t->nip }}</td>
                    <td class="tg-qr5b">{{ $t->golongan }}</td>
                    <td class="tg-qr5b text-center">{{ $t->tmt_gol_terakhir_format }}</td>
                    <td class="tg-qr5b text-center">{{ $t->tmt_sekolah_format }}</td>
                    <td class="tg-qr5b">{{ $t->jabatan }}</td>
                    <td class="tg-qr5b text-center">{{ $t->tmt_jabatan_format }}</td>
                    <td class="tg-qr5b">{{ $t->tempat_lahir }}</td>
                    <td class="tg-qr5b text-center">{{ $t->tanggal_lahir_format }}</td>
                    <td class="tg-qr5b">{{ $t->alamat_rumah }}</td>
                    <td class="tg-qr5b text-center">{{ $t->tmt_sebagai_guru_format }}</td>
                    <td class="tg-qr5b">{{ $t->mapel }}</td>
                    <td class="tg-qr5b text-center">{!! $t->sertifikasi == "1" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->jenis_kelamin == "L" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->jenis_kelamin == "P" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->status_pegawai == "PNS" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->status_pegawai == "GBD" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->status_pegawai == "GTT" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->status_pegawai == "GTY" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->pendidikan == "SMA" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->pendidikan == "D1" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->pendidikan == "D2" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->pendidikan == "D3" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->pendidikan == "S1" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->pendidikan == "S2" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $t->pendidikan == "S3" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b">{{ $t->jurusan }}</td>
                    <td class="tg-qr5b">{{ $t->jjm == NULL ? "-" : $t->jjm }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="30" class="kop text-uppercase text-center">
                        LAPORAN TENAGA PENDIDIK {{ $bulan }} BELUM DI GENERATE
                    </td>
                </tr>
                @endforelse
                <tr>
                    <td class="tg-lq7p" colspan="14" rowspan="2"><span style="font-weight:bold">JUMLAH</span></td>
                    <td class="tg-lq7p" style="midd" rowspan="2">{{ $teachers->where('sertifikasi', '1')->count() }}
                    </td>
                    <td class="tg-lq7p">{{ $laki = $teachers->where('jenis_kelamin', 'L')->count() }}</td>
                    <td class="tg-lq7p">{{ $perempuan = $teachers->where('jenis_kelamin', 'P')->count() }}</td>
                    <td class="tg-lq7p">{{ $pns = $teachers->where('status_pegawai', 'PNS')->count() }}</td>
                    <td class="tg-lq7p">{{ $gbd = $teachers->where('status_pegawai', 'GBD')->count() }}</td>
                    <td class="tg-lq7p">{{ $gtt = $teachers->where('status_pegawai', 'GTT')->count() }}</td>
                    <td class="tg-lq7p">{{ $gty = $teachers->where('status_pegawai', 'GTY')->count() }}</td>
                    <td class="tg-lq7p">{{ $sma = $teachers->where('pendidikan', 'SMA')->count() }}</td>
                    <td class="tg-lq7p">{{ $d1 = $teachers->where('pendidikan', 'D1')->count() }}</td>
                    <td class="tg-lq7p">{{ $d2 = $teachers->where('pendidikan', 'D2')->count() }}</td>
                    <td class="tg-lq7p">{{ $d3 = $teachers->where('pendidikan', 'D3')->count() }}</td>
                    <td class="tg-lq7p">{{ $s1 = $teachers->where('pendidikan', 'S1')->count() }}</td>
                    <td class="tg-lq7p">{{ $s2 = $teachers->where('pendidikan', 'S2')->count() }}</td>
                    <td class="tg-lq7p">{{ $s3 = $teachers->where('pendidikan', 'S3')->count() }}</td>
                    <td class="tg-lq7p" rowspan="2" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-lq7p" colspan="2">{{ $laki+$perempuan }}</td>
                    <td class="tg-lq7p" colspan="4">{{ $pns+$gbd+$gtt+$gty }}</td>
                    <td class="tg-lq7p" colspan="7">{{ $sma+$d1+$d2+$d3+$s1+$s2+$s3 }}</td>
                </tr>
            </tbody>
        </table>
        <div class="page-break"></div>


        {{-- <h2 class="kop text-center">DATA TENAGA PENDIDIK</h2> --}}
        <h3 class="kop text-uppercase">III. DATA TENAGA KEPENDIDIKAN</h3>
        <table class="tg" style="width: 100%">
            <thead>
                <tr>
                    <th class="tg-tu9x" rowspan="2">NO</th>
                    <th class="tg-tu9x" rowspan="2">NAMA</th>
                    <th class="tg-tu9x" rowspan="2">NUPTK</th>
                    <th class="tg-tu9x" rowspan="2">NIP/NIPGB</th>
                    <th class="tg-tu9x" rowspan="2">GOL</th>
                    <th class="tg-tu9x" rowspan="2">TMT GOL</th>
                    <th class="tg-tu9x" rowspan="2">TMT DI SEKOLAH</th>
                    <th class="tg-tu9x" rowspan="2">JABATAN</th>
                    <th class="tg-tu9x" rowspan="2">TMT JABATAN</th>
                    <th class="tg-tu9x" rowspan="2">TEMPAT LAHIR</th>
                    <th class="tg-tu9x" rowspan="2">TANGGAL LAHIR</th>
                    <th class="tg-tu9x" rowspan="2">ALAMAT RUMAH</th>
                    <th class="tg-tu9x" rowspan="2">TMT SEBAGAI GURU</th>
                    <th class="tg-m4qq" colspan="2">JK</th>
                    <th class="tg-m4qq" colspan="4">STATUS</th>
                    <th class="tg-m4qq" colspan="8">PENDIDIKAN</th>
                </tr>
                <tr>
                    <td class="tg-m4qq">L</td>
                    <td class="tg-m4qq">P</td>
                    <td class="tg-m4qq">PNS</td>
                    <td class="tg-m4qq">PTT</td>
                    <td class="tg-m4qq">PTY</td>
                    <td class="tg-m4qq">SD</td>
                    <td class="tg-m4qq">SMP</td>
                    <td class="tg-m4qq">SMA</td>
                    <td class="tg-m4qq">D1</td>
                    <td class="tg-m4qq">D2</td>
                    <td class="tg-m4qq">D3</td>
                    <td class="tg-m4qq">S1</td>
                    <td class="tg-m4qq">S2</td>
                    <td class="tg-tu9x">S3</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $e)
                <tr>
                    <td class="tg-qr5b">{{ $loop->iteration }}</td>
                    <td class="tg-qr5b">{{ $e->nama }}</td>
                    <td class="tg-qr5b">{{ $e->nuptk }}</td>
                    <td class="tg-qr5b">{{ $e->nip }}</td>
                    <td class="tg-qr5b">{{ $e->golongan }}</td>
                    <td class="tg-qr5b text-center">{{ $e->tmt_gol_terakhir_format }}</td>
                    <td class="tg-qr5b text-center">{{ $e->tmt_sekolah_format }}</td>
                    <td class="tg-qr5b">{{ $e->jabatan }}</td>
                    <td class="tg-qr5b text-center">{{ $e->tmt_jabatan_format }}</td>
                    <td class="tg-qr5b">{{ $e->tempat_lahir }}</td>
                    <td class="tg-qr5b text-center">{{ $e->tanggal_lahir_format }}</td>
                    <td class="tg-qr5b">{{ $e->alamat_rumah }}</td>
                    <td class="tg-qr5b text-center">{{ $e->tmt_sebagai_guru_format }}</td>
                    <td class="tg-qr5b text-center">{!! $e->jenis_kelamin == "L" ? '<span>&#10003;</span>' : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->jenis_kelamin == "P" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->status_pegawai == "PNS" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->status_pegawai == "PTT" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->status_pegawai == "PTY" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->pendidikan == "SD" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->pendidikan == "SMP" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->pendidikan == "SMA" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->pendidikan == "D1" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->pendidikan == "D2" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->pendidikan == "D3" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->pendidikan == "S1" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->pendidikan == "S2" ? "<span>&#10003;</span>" : "-" !!}</td>
                    <td class="tg-qr5b text-center">{!! $e->pendidikan == "S3" ? "<span>&#10003;</span>" : "-" !!}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="27" class="kop text-uppercase text-center">
                        LAPORAN TENAGA KEPENDIDIKAN {{ $bulan }} BELUM DI GENERATE
                    </td>
                </tr>
                @endforelse
                <tr>
                    <td class="tg-lq7p" colspan="12" rowspan="3"><span style="font-weight:bold">JUMLAH</span></td>
                    <td class="tg-lq7p" rowspan="2"></td>
                    <td class="tg-lq7p">{{ $lakie = $employees->where('jenis_kelamin', 'L')->count() }}</td>
                    <td class="tg-lq7p">{{ $perempuane = $employees->where('jenis_kelamin', 'P')->count() }}</td>
                    <td class="tg-lq7p">{{ $pnse = $employees->where('status_pegawai', 'PNS')->count() }}</td>
                    <td class="tg-lq7p">{{ $ptt = $employees->where('status_pegawai', 'PTT')->count() }}</td>
                    <td class="tg-lq7p">{{ $pty = $employees->where('status_pegawai', 'PTY')->count() }}</td>
                    <td class="tg-lq7p">{{ $sd = $employees->where('pendidikan', 'SD')->count() }}</td>
                    <td class="tg-lq7p">{{ $smp = $employees->where('pendidikan', 'SMP')->count() }}</td>
                    <td class="tg-lq7p">{{ $smae = $employees->where('pendidikan', 'SMA')->count() }}</td>
                    <td class="tg-lq7p">{{ $d1e = $employees->where('pendidikan', 'D1')->count() }}</td>
                    <td class="tg-lq7p">{{ $d2e = $employees->where('pendidikan', 'D2')->count() }}</td>
                    <td class="tg-lq7p">{{ $d3e = $employees->where('pendidikan', 'D3')->count() }}</td>
                    <td class="tg-lq7p">{{ $s1e = $employees->where('pendidikan', 'S1')->count() }}</td>
                    <td class="tg-lq7p">{{ $s2e = $employees->where('pendidikan', 'S2')->count() }}</td>
                    <td class="tg-lq7p">{{ $s3e = $employees->where('pendidikan', 'S3')->count() }}</td>
                </tr>
                <tr>
                    <td class="tg-lq7p" colspan="2">{{ $lakie+$perempuane }}</td>
                    <td class="tg-lq7p" colspan="4">{{ $pnse+$pty+$ptt }}</td>
                    <td class="tg-lq7p" colspan="8">{{ $sd+$smp+$smae+$d1e+$d2e+$d3e+$s1e+$s2e+$s3e }}</td>
                </tr>
            </tbody>
        </table>
        <div class="page-break"></div>

        <h3 class="kop text-uppercase">IV. DATA PESERTA DIDIK</h3>
        <table class="tg" style="width: 100%">
            <thead>
                <tr>
                    <th rowspan="2" class="tg-need">#</th>
                    <th rowspan="2" class="tg-need">KELAS</th>
                    <th colspan="3" class="tg-need">JMLH SISWA BERDASARKAN KELAS</th>
                    <th colspan="10" class="tg-need">JMLH SISWA BERDASARKAN UMUR</th>
                    <th colspan="8" class="tg-need">JMLH SISWA BERDASARKAN AGAMA</th>
                </tr>
                <tr>
                    <th class="tg-need">L</th>
                    <th class="tg-need">P</th>
                    <th class="tg-need">JUMLAH</th>
                    <th class="tg-need">6</th>
                    <th class="tg-need">7</th>
                    <th class="tg-need">8</th>
                    <th class="tg-need">9</th>
                    <th class="tg-need">10</th>
                    <th class="tg-need">11</th>
                    <th class="tg-need">12</th>
                    <th class="tg-need">13</th>
                    <th class="tg-need">14</th>
                    <th class="tg-need">15</th>
                    <th class="tg-need">JUMLAH</th>
                    <th class="tg-need">ISLAM</th>
                    <th class="tg-need">KATOLIK</th>
                    <th class="tg-need">PROTESTAN</th>
                    <th class="tg-need">HINDU</th>
                    <th class="tg-need">BUDHA</th>
                    <th class="tg-need">LAIN-LAIN</th>
                    <th class="tg-need">JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total_siswa_l = 0;
                $total_siswa_p = 0;
                $total_jk = 0;
                $total_usia_6 = 0;
                $total_usia_7 = 0;
                $total_usia_8 = 0;
                $total_usia_9 = 0;
                $total_usia_10 = 0;
                $total_usia_11 = 0;
                $total_usia_12 = 0;
                $total_usia_13 = 0;
                $total_usia_14 = 0;
                $total_usia_15 = 0;
                $total_usia = 0;
                $total_islam = 0;
                $total_katolik = 0;
                $total_protestan = 0;
                $total_hindu = 0;
                $total_budha = 0;
                $total_lain = 0;
                $total_agama = 0;
                $no = 1;
                @endphp
                @forelse ($students as $student)
                    @foreach ($student as $s)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $s->kelas }}</td>
                            <td class="text-center">{{ $s->siswa_l }}</td>
                            <td class="text-center">{{ $s->siswa_p }}</td>
                            <td class="text-center" style="background-color: #c0c0c0; font-weight: bold;">
                                {{ $s->siswa_p+$s->siswa_l }}
                            </td>
                            <td class="text-center">{{ $s->usia_6 }}</td>
                            <td class="text-center">{{ $s->usia_7 }}</td>
                            <td class="text-center">{{ $s->usia_8 }}</td>
                            <td class="text-center">{{ $s->usia_9 }}</td>
                            <td class="text-center">{{ $s->usia_10 }}</td>
                            <td class="text-center">{{ $s->usia_11 }}</td>
                            <td class="text-center">{{ $s->usia_12 }}</td>
                            <td class="text-center">{{ $s->usia_13 }}</td>
                            <td class="text-center">{{ $s->usia_14 }}</td>
                            <td class="text-center">{{ $s->usia_15 }}</td>
                            <td class="text-center" style="background-color: #c0c0c0; font-weight: bold;">
                                {{ $s->usia_6+$s->usia_7+$s->usia_8+$s->usia_9+$s->usia_10+$s->usia_11+$s->usia_12+$s->usia_13+$s->usia_14+$s->usia_15 }}
                            </td>
                            <td class="text-center">{{ $s->islam }}</td>
                            <td class="text-center">{{ $s->katolik }}</td>
                            <td class="text-center">{{ $s->protestan }}</td>
                            <td class="text-center">{{ $s->hindu }}</td>
                            <td class="text-center">{{ $s->budha }}</td>
                            <td class="text-center">{{ $s->lain }}</td>
                            <td class="text-center" style="background-color: #c0c0c0; font-weight: bold;">
                                {{ $s->islam+$s->katolik+$s->protestan+$s->hindu+$s->budha }}
                            </td>
                        </tr>
                    @endforeach
                    @php
                        $total_siswa_l += $student->sum('siswa_l'); 
                        $total_siswa_p += $student->sum('siswa_p');
                        $total_jk += $student->sum('siswa_l')+$student->sum('siswa_p');
                        $total_usia_6 += $student->sum('usia_6'); 
                        $total_usia_7 += $student->sum('usia_7'); 
                        $total_usia_8 += $student->sum('usia_8'); 
                        $total_usia_9 += $student->sum('usia_9'); 
                        $total_usia_10 += $student->sum('usia_10'); 
                        $total_usia_11 += $student->sum('usia_11'); 
                        $total_usia_12 += $student->sum('usia_12'); 
                        $total_usia_13 += $student->sum('usia_13'); 
                        $total_usia_14 += $student->sum('usia_14'); 
                        $total_usia_15 += $student->sum('usia_15'); 
                        $total_usia += $student->sum('usia_6')+$student->sum('usia_7')+$student->sum('usia_8')+$student->sum('usia_9')+$student->sum('usia_10')+$student->sum('usia_11')+$student->sum('usia_12')+$student->sum('usia_13')+$student->sum('usia_14')+$student->sum('usia_15');
                        $total_islam += $student->sum('islam'); 
                        $total_katolik += $student->sum('katolik'); 
                        $total_protestan += $student->sum('protestan'); 
                        $total_hindu += $student->sum('hindu'); 
                        $total_budha += $student->sum('budha'); 
                        $total_lain += $student->sum('lain'); 
                        $total_agama += $student->sum('islam')+$student->sum('protestan')+$student->sum('hindu')+$student->sum('budha')+$student->sum('lain');
                    @endphp
                    <tr style="background-color: #c0c0c0; font-weight: bold;">
                        <td colspan="2" class="text-center" style="background-color: #c0c0c0; font-weight: bold;">JUMLAH</td>
                        <td class="text-center">{{ $student->sum('siswa_l') }}</td>
                        <td class="text-center">{{ $student->sum('siswa_p') }}</td>
                        <td class="text-center">{{ $student->sum('siswa_l')+$student->sum('siswa_p') }}</td>
                        <td class="text-center">{{ $student->sum('usia_6') }}</td>
                        <td class="text-center">{{ $student->sum('usia_7') }}</td>
                        <td class="text-center">{{ $student->sum('usia_8') }}</td>
                        <td class="text-center">{{ $student->sum('usia_9') }}</td>
                        <td class="text-center">{{ $student->sum('usia_10') }}</td>
                        <td class="text-center">{{ $student->sum('usia_11') }}</td>
                        <td class="text-center">{{ $student->sum('usia_12') }}</td>
                        <td class="text-center">{{ $student->sum('usia_13') }}</td>
                        <td class="text-center">{{ $student->sum('usia_14') }}</td>
                        <td class="text-center">{{ $student->sum('usia_15') }}</td>
                        <td class="text-center">
                            {{ $student->sum('usia_6')+$student->sum('usia_7')+$student->sum('usia_8')+$student->sum('usia_9')+$student->sum('usia_10')+$student->sum('usia_11')+$student->sum('usia_12')+$student->sum('usia_13')+$student->sum('usia_14')+$student->sum('usia_15') }}
                        </td>
                        <td class="text-center">{{ $student->sum('islam') }}</td>
                        <td class="text-center">{{ $student->sum('katolik') }}</td>
                        <td class="text-center">{{ $student->sum('protestan') }}</td>
                        <td class="text-center">{{ $student->sum('hindu') }}</td>
                        <td class="text-center">{{ $student->sum('budha') }}</td>
                        <td class="text-center">{{ $student->sum('lain') }}</td>
                        <td class="text-center">
                            {{ $student->sum('islam')+$student->sum('katolik')+$student->sum('protestan')+$student->sum('hindu')+$student->sum('budha')+$student->sum('lain') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="23" class="kop text-uppercase text-center">
                            LAPORAN PESERTA DIDIK {{ $bulan }} BELUM DI GENERATE
                        </td>
                    </tr>
                @endforelse
                @if (count($students) != 0)
                    <tr style="background-color: #c0c0c0; font-weight: bold;">
                        <td colspan="2" class="text-center">JUMLAH KESELURUHAN</td>
                        <td class="text-center">{{ $total_siswa_l }}</td>
                        <td class="text-center">{{ $total_siswa_p }}</td>
                        <td class="text-center">{{ $total_jk }}</td>
                        <td class="text-center">{{ $total_usia_6 }}</td>
                        <td class="text-center">{{ $total_usia_7 }}</td>
                        <td class="text-center">{{ $total_usia_8 }}</td>
                        <td class="text-center">{{ $total_usia_9 }}</td>
                        <td class="text-center">{{ $total_usia_10 }}</td>
                        <td class="text-center">{{ $total_usia_11 }}</td>
                        <td class="text-center">{{ $total_usia_12 }}</td>
                        <td class="text-center">{{ $total_usia_13 }}</td>
                        <td class="text-center">{{ $total_usia_14 }}</td>
                        <td class="text-center">{{ $total_usia_15 }}</td>
                        <td class="text-center">{{ $total_usia }}</td>
                        <td class="text-center">{{ $total_islam }}</td>
                        <td class="text-center">{{ $total_katolik }}</td>
                        <td class="text-center">{{ $total_protestan }}</td>
                        <td class="text-center">{{ $total_hindu }}</td>
                        <td class="text-center">{{ $total_budha }}</td>
                        <td class="text-center">{{ $total_lain }}</td>
                        <td class="text-center">{{ $total_agama }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="page-break"></div>

        <h3 class="kop text-uppercase">V. KONDISI SARANA DAN PRASARAN</h3>
        <table class="tg" style="width: 100%">
            <thead>
                <tr>
                    <th class="tg-need" rowspan="2">NO</th>
                    <th class="tg-need" rowspan="2">URAIAN</th>
                    <th class="tg-need" colspan="4">KONDISI </th>
                    <th class="tg-need" rowspan="2">JUMLAH</th>
                    <th class="tg-need" rowspan="2">KEBUTUHAN</th>    
                    <th class="tg-need" rowspan="2">KETERANGAN</th>                               
                </tr>
                <tr>
                  <th class="tg-need">BAIK</th>
                  <th class="tg-need">RUSAK RINGAN</th>
                  <th class="tg-need">RUSAK SEDANG</th>
                  <th class="tg-need">RUSAK BERAT</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($facilities as $f)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $f->uraian }}</td>
                    <td class="text-center">{{ $f->baik }}</td>
                    <td class="text-center">{{ $f->rusak_ringan }}</td>
                    <td class="text-center">{{ $f->rusak_sedang }}</td>
                    <td class="text-center">{{ $f->rusak_berat }}</td>
                    <td class="text-center" style="background-color: #c0c0c0;">{{ $jumlah = $f->baik+$f->rusak_ringan+$f->rusak_sedang+$f->rusak_berat }}</td>
                    <td class="text-center">{{ $f->kebutuhan }}</td>
                    <td class="text-center">
                      @if ($jumlah > $f->kebutuhan)
                          LEBIH
                      @elseif ($jumlah == $f->kebutuhan)
                          CUKUP
                      @else
                          KEKURANG
                      @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="kop text-uppercase text-center">
                        LAPORAN KONDIDI SARANA DAN PRASARAN {{ $bulan }} BELUM DI GENERATE
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="page-break"></div>

        
        <h3 class="kop text-uppercase">VI. REKAP LAPORANA BULANAN {{ $schools->nama_sekolah }}</h3>
        <table class="tg" style="width: 100%">
            <thead>
                <tr>
                    <th class="tg-need" rowspan="2">NO</th>
                    <th class="tg-need" colspan="4">JUMLAH GURU</th>
                    <th class="tg-need" colspan="4">JUMLAH TU</th>
                    <th class="tg-need" colspan="2">JUMLAH SISWA</th>                              
                </tr>
                <tr>
                  <th class="tg-need">LAKI-LAKI</th>
                  <th class="tg-need">PEREMPUAN</th>
                  <th class="tg-need">PNS</th>
                  <th class="tg-need">NON PNS</th>
                  <th class="tg-need">LAKI-LAKI</th>
                  <th class="tg-need">PEREMPUAN</th>
                  <th class="tg-need">PNS</th>
                  <th class="tg-need">NON PNS</th>
                  <th class="tg-need">LAKI-LAKI</th>
                  <th class="tg-need">PEREMPUAN</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                  <td class="text-center">1</td>
                  <td class="text-center">{{ $laki }}</td>
                  <td class="text-center">{{ $perempuan }}</td>
                  <td class="text-center">{{ $pns }}</td>
                  <td class="text-center">{{ $gbd+$gtt+$gty }}</td>
                  <td class="text-center">{{ $lakie }}</td>
                  <td class="text-center">{{ $perempuane }}</td>
                  <td class="text-center">{{ $pnse }}</td>
                  <td class="text-center">{{ $pty+$ptt }}</td>
                  <td class="text-center">{{ $total_siswa_l }}</td>
                  <td class="text-center">{{ $total_siswa_p }}</td>
              </tr>
              <tr class="tg-need">
                <td class="text-center">JUMLAH</td>
                <td class="text-center" colspan="2">{{ $laki+$perempuan }}</td>
                <td class="text-center" colspan="2">{{ $pns+$gbd+$gtt+$gty }}</td>
                <td class="text-center" colspan="2">{{ $lakie+$perempuane }}</td>
                <td class="text-center" colspan="2">{{ $pnse+$pty+$ptt }}</td>
                <td class="text-center" colspan="2">{{ $total_siswa_l+$total_siswa_p }}</td>
            </tr>
            </tbody>
        </table>
        <div class="signature">
            <p>{{ $schools->district->nama }}, {{ Carbon\Carbon::now()->isoFormat('D MMMM Y') }}<br>Kepala Sekolah</p>
            <br><br><br><br>
            <span style="text-decoration: underline; font-weight:bold;">{{ $schools->kepala_sekolah }}</span><br>
            {{ $schools->nip_kepala_sekolah }}
        </div>
    </section>
    <script type="text/javascript">
      function PrintWindow() {                    
         window.print();            
         CheckWindowState();
      }  
      function CheckWindowState()    {           
          if(document.readyState=="complete") {
              window.close(); 
          } else {           
              setTimeout("CheckWindowState()", 2000)
          }
      }
      PrintWindow();
  </script> 
</body>

</html>