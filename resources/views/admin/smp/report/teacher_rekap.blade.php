<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LAPORAN TENAGA PENDIDIK BULAN {{ $data['bulan'] }}</title>
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
<body class="A4 landscape">
    <section class="sheet padding-10mm">
        <div class="kop text-center">
            <h4 class="text-uppercase">REKAPITULASI LAPORAN BULANAN SEKOLAH <br>TENAGA PENDIDIK <br>BULAN {{ $data['bulan'] }}</h4>
        </div>
        <table class="table-sekolah">
            <tr>
                <td>Nama Kabupaten</td>
                <td>:</td>
                <td class="text-uppercase">Kabupaten Bengkulu Utara</td>
            </tr>
            <tr>
                <td>Nama Kecamatan</td>
                <td>:</td>
                <td>{{ $data['kecamatan'] }}</td>
            </tr>
            <tr>
                <td>Jumlah Sekolah</td>
                <td>:</td>
                <td>{{ $data['jlh_sekolah'] }}</td>
            </tr>
            <tr>
                <td>Jenjang Pendidikan</td>
                <td>:</td>
                <td>SMP</td>
            </tr>
        </table>
        <table class="tg" style="width: 100%">
            <thead>
                <tr>
                    <th class="tg-tu9x" rowspan="2">NO</th>
                    <th class="tg-tu9x" rowspan="2">Nama Sekolah</th>
                    <th class="tg-tu9x" colspan="4">JUMLAH TENAGA PENDIDIK</th>
                    <th class="tg-tu9x" rowspan="2">TOTAL</th>
                </tr>
                <tr>
                    <td class="tg-m4qq">Laki-laki</td>
                    <td class="tg-m4qq">Perempuan</td>
                    <td class="tg-m4qq">PNS</td>
                    <td class="tg-m4qq">NON PNS</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $laki_r = 0;
                    $perempuan_r = 0;
                    $pns_r = 0;
                @endphp
                @foreach ($schools as $key => $t)
                @php
                    $laki_r += $t->teacherReportSmp->where('jenis_kelamin', 'L')->count();
                    $perempuan_r += $t->teacherReportSmp->where('jenis_kelamin', 'P')->count();
                    $pns_r += $t->teacherReportSmp->where('status_pegawai', 'PNS')->count();
                @endphp
                    <tr>
                        <td class="tg-qr5b text-center">{{ $loop->iteration }}</td>
                        <td class="tg-qr5b">{{ $t->nama_sekolah }}</td>
                        <td class="tg-qr5b text-center">{{ $laki = $t->teacherReportSmp->where('jenis_kelamin', 'L')->count() }}</td>
                        <td class="tg-qr5b text-center">{{ $perempuan = $t->teacherReportSmp->where('jenis_kelamin', 'P')->count() }}</td>
                        <td class="tg-qr5b text-center">{{ $pns = $t->teacherReportSmp->where('status_pegawai', 'PNS')->count() }}</td>
                        <td class="tg-qr5b text-center">{{ $laki+$perempuan-$pns }}</td>
                        <td class="tg-qr5b text-center">{{ $laki+$perempuan }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="tg-lq7p" colspan="2"><span style="font-weight:bold">TOTAL</span></td>
                    <td class="tg-lq7p">{{ $laki_r }}</td>
                    <td class="tg-lq7p">{{ $perempuan_r }}</td>
                    <td class="tg-lq7p">{{ $pns_r }}</td>
                    <td class="tg-lq7p">{{ $laki_r+$perempuan_r-$pns_r }}</td>
                    <td class="tg-lq7p">{{ $laki_r+$perempuan_r }}</td>
                </tr>
            </tbody>
        </table>
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