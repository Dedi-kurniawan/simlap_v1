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
        <div class="page-break"></div>
        <h3 class="kop text-uppercase">II. DATA TENAGA PENDIDIK</h3>
        <table class="tg">
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