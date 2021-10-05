<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LAPORAN BULAN {{ $data['bulan'] }}</title>
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
            <h4 class="text-uppercase">
                REKAPITULASI LAPORAN BULANAN SEKOLAH <br>PESERTA DIDIK <br>BULAN {{ $data['bulan'] }}
            </h4>
        </div>
        <table class="table-sekolah">
            <tr>
                <td>Nama Kabupaten</td>
                <td>:</td>
                <td class="text-uppercase">Kabupeten Bengkulu Utara</td>
            </tr>
            <tr>
                <td>Jumlah Kecamatan</td>
                <td>:</td>
                <td>{{ $data['kecamatan'] }}</td>
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
                    <th class="tg-tu9x" colspan="2">JK</th>
                    <th class="tg-tu9x" colspan="9">USIA</th>
                    <th class="tg-tu9x" rowspan="2">TOTAL</th>
                </tr>
                <tr>
                    <td class="tg-m4qq">Laki-laki</td>
                    <td class="tg-m4qq">Perempuan</td>
                    <td class="tg-m4qq">11</td>
                    <td class="tg-m4qq">12</td>
                    <td class="tg-m4qq">13</td>
                    <td class="tg-m4qq">14</td>
                    <td class="tg-m4qq">15</td>
                    <td class="tg-m4qq">16</td>
                    <td class="tg-m4qq">17</td>
                    <td class="tg-m4qq">18</td>
                    <td class="tg-m4qq">19</td>
                </tr>
            </thead>
            <tbody>
                @php                    
                    $total_siswa_l_r = 0;
                    $total_siswa_p_r = 0;
                    $total_usia_11_r = 0;
                    $total_usia_12_r = 0;
                    $total_usia_13_r = 0;
                    $total_usia_14_r = 0;
                    $total_usia_15_r = 0;
                    $total_usia_16_r = 0;
                    $total_usia_17_r = 0;
                    $total_usia_18_r = 0;
                    $total_usia_19_r = 0;
                    $total_all_r = 0;
                @endphp
                @foreach ($district as $dist)    
                @php
                    $total_siswa_l = 0;
                    $total_siswa_p = 0;
                    $total_usia_11 = 0;
                    $total_usia_12 = 0;
                    $total_usia_13 = 0;
                    $total_usia_14 = 0;
                    $total_usia_15 = 0;
                    $total_usia_16 = 0;
                    $total_usia_17 = 0;
                    $total_usia_18 = 0;
                    $total_usia_19 = 0;
                    $total_all = 0;
                @endphp            
                    @foreach ($schools as $key => $value)
                        @if ($dist->nama == $key)
                            @foreach ($value as $t)
                                @php
                                    $total_siswa_l += $t->studentReportSmp->sum('siswa_l');
                                    $total_siswa_p += $t->studentReportSmp->sum('siswa_p');
                                    $total_usia_11 += $t->studentReportSmp->sum('usia_11');
                                    $total_usia_12 += $t->studentReportSmp->sum('usia_12');
                                    $total_usia_13 += $t->studentReportSmp->sum('usia_13');
                                    $total_usia_14 += $t->studentReportSmp->sum('usia_14');
                                    $total_usia_15 += $t->studentReportSmp->sum('usia_15');
                                    $total_usia_16 += $t->studentReportSmp->sum('usia_16');
                                    $total_usia_17 += $t->studentReportSmp->sum('usia_17');
                                    $total_usia_18 += $t->studentReportSmp->sum('usia_18');
                                    $total_usia_19 += $t->studentReportSmp->sum('usia_19');
                                    $total_all += $t->studentReportSmp->sum('siswa_l')+$t->studentReportSmp->sum('siswa_p');
                                @endphp
                            @endforeach
                        @endif                    
                    @endforeach
                    <tr>
                        <td class="tg-qr5b text-center">{{ $loop->iteration }}</td>
                        <td class="tg-qr5b">{{ $dist->nama }}</td>
                        <td class="tg-qr5b text-center">{{ $total_siswa_l }}</td>
                        <td class="tg-qr5b text-center">{{ $total_siswa_p }}</td>
                        <td class="tg-qr5b text-center">{{ $total_usia_11 }}</td>
                        <td class="tg-qr5b text-center">{{ $total_usia_12 }}</td>
                        <td class="tg-qr5b text-center">{{ $total_usia_13 }}</td>
                        <td class="tg-qr5b text-center">{{ $total_usia_14 }}</td>
                        <td class="tg-qr5b text-center">{{ $total_usia_15 }}</td>
                        <td class="tg-qr5b text-center">{{ $total_usia_16 }}</td>
                        <td class="tg-qr5b text-center">{{ $total_usia_17 }}</td>
                        <td class="tg-qr5b text-center">{{ $total_usia_18 }}</td>
                        <td class="tg-qr5b text-center">{{ $total_usia_19 }}</td>
                        <td class="tg-qr5b text-center">{{ $total_all }}</td>
                    </tr>                    
                    @php
                        $total_siswa_l_r += $total_siswa_l;
                        $total_siswa_p_r += $total_siswa_p;
                        $total_usia_11_r += $total_usia_11;
                        $total_usia_12_r += $total_usia_12;
                        $total_usia_13_r += $total_usia_13;
                        $total_usia_14_r += $total_usia_14;
                        $total_usia_15_r += $total_usia_15;
                        $total_usia_16_r += $total_usia_16;
                        $total_usia_17_r += $total_usia_17;
                        $total_usia_18_r += $total_usia_18;
                        $total_usia_19_r += $total_usia_19;
                    @endphp 
                @endforeach
                <tr>
                    <td class="tg-lq7p" colspan="2"><span style="font-weight:bold">TOTAL</span></td>
                    <td class="tg-lq7p text-center">{{ $total_siswa_l_r }}</td>
                    <td class="tg-lq7p text-center">{{ $total_siswa_p_r }}</td>
                    <td class="tg-lq7p text-center">{{ $total_usia_11_r }}</td>
                    <td class="tg-lq7p text-center">{{ $total_usia_12_r }}</td>
                    <td class="tg-lq7p text-center">{{ $total_usia_13_r }}</td>
                    <td class="tg-lq7p text-center">{{ $total_usia_14_r }}</td>
                    <td class="tg-lq7p text-center">{{ $total_usia_15_r }}</td>
                    <td class="tg-lq7p text-center">{{ $total_usia_16_r }}</td>
                    <td class="tg-lq7p text-center">{{ $total_usia_17_r }}</td>
                    <td class="tg-lq7p text-center">{{ $total_usia_18_r }}</td>
                    <td class="tg-lq7p text-center">{{ $total_usia_19_r }}</td>
                    <td class="tg-lq7p text-center">{{ $total_siswa_l_r+$total_siswa_p_r }}</td>
                </tr>
            </tbody>
        </table>
    </section>
     <script type="text/javascript">
        function PrintWindow() {
            window.print();
            CheckWindowState();
        }

        function CheckWindowState() {
            if (document.readyState == "complete") {
                window.close();
            } else {
                setTimeout("CheckWindowState()", 2000)
            }
        }
        PrintWindow();

    </script> 
</body>

</html>
