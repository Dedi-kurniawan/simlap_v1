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
        <h3 class="kop text-uppercase">II. DATA TENAGA KEPENDIDIKAN</h3>
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