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
            <tr>
                <td>11</td>
                <td>KOORDINATOR</td>
                <td>:</td>
                <td>{{ $schools->koordinator->nama }}</td>
            </tr>
        </table>

        <div class="page-break"></div>        
        <h3 class="kop text-uppercase">II. DATA PESERTA DIDIK</h3>
        <table class="tg" style="width: 100%">
            <thead>
                <tr>
                    <th rowspan="2" class="tg-need">#</th>
                    <th rowspan="2" class="tg-need">KELAS</th>
                    <th colspan="3" class="tg-need">JMLH SISWA BERDASARKAN KELAS</th>
                    <th colspan="5" class="tg-need">JMLH SISWA BERDASARKAN UMUR</th>
                    <th colspan="8" class="tg-need">JMLH SISWA BERDASARKAN AGAMA</th>
                </tr>
                <tr>
                    <th class="tg-need">L</th>
                    <th class="tg-need">P</th>
                    <th class="tg-need">JUMLAH</th>
                    <th class="tg-need">2</th>
                    <th class="tg-need">3</th>
                    <th class="tg-need">4</th>
                    <th class="tg-need">5</th>
                    <th class="tg-need">6</th>
                    <th class="tg-need">JUMLAH</th>
                    <th class="tg-need">ISLAM</th>
                    <th class="tg-need">KATOLIK</th>
                    <th class="tg-need">PROTESTAN</th>
                    <th class="tg-need">HINDU</th>
                    <th class="tg-need">BUDHA</th>
                    <th class="tg-need">LAIN-LAIN</th>
                    <th class="tg-need">JMLH</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total_siswa_l = 0;
                $total_siswa_p = 0;
                $total_jk = 0;
                $total_usia_2 = 0;
                $total_usia_3 = 0;
                $total_usia_4 = 0;
                $total_usia_5 = 0;
                $total_usia_6 = 0;
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
                            <td class="text-center">{{ $s->usia_2 }}</td>
                            <td class="text-center">{{ $s->usia_3 }}</td>
                            <td class="text-center">{{ $s->usia_4 }}</td>
                            <td class="text-center">{{ $s->usia_5 }}</td>
                            <td class="text-center">{{ $s->usia_6 }}</td>
                            <td class="text-center" style="background-color: #c0c0c0; font-weight: bold;">
                                {{ $s->usia_2+$s->usia_3+$s->usia_4+$s->usia_5+$s->usia_6 }}
                            </td>
                            <td class="text-center">{{ $s->islam }}</td>
                            <td class="text-center">{{ $s->katolik }}</td>
                            <td class="text-center">{{ $s->protestan }}</td>
                            <td class="text-center">{{ $s->hindu }}</td>
                            <td class="text-center">{{ $s->budha }}</td>
                            <td class="text-center">{{ $s->lain }}</td>
                            <td class="text-center" style="background-color: #c0c0c0; font-weight: bold;">
                                {{ $s->islam+$s->katolik+$s->protestan+$s->hindu+$s->budha+$s->lain }}
                            </td>
                        </tr>
                    @endforeach
                        @php
                            $total_siswa_l += $student->sum('siswa_l'); 
                            $total_siswa_p += $student->sum('siswa_p');
                            $total_jk += $student->sum('siswa_l')+$student->sum('siswa_p');
                            $total_usia_2 += $student->sum('usia_2'); 
                            $total_usia_3 += $student->sum('usia_3'); 
                            $total_usia_4 += $student->sum('usia_4'); 
                            $total_usia_5 += $student->sum('usia_5'); 
                            $total_usia_6 += $student->sum('usia_6');
                            $total_usia += $student->sum('usia_6')+$student->sum('usia_3')+$student->sum('usia_4')+$student->sum('usia_5')+$student->sum('usia_6');
                            $total_islam += $student->sum('islam'); 
                            $total_katolik += $student->sum('katolik'); 
                            $total_protestan += $student->sum('protestan'); 
                            $total_hindu += $student->sum('hindu'); 
                            $total_budha += $student->sum('budha'); 
                            $total_lain += $student->sum('lain'); 
                            $total_agama += $student->sum('islam')+$student->sum('katolik')+$student->sum('protestan')+$student->sum('hindu')+$student->sum('budha')+$student->sum('lain');
                        @endphp
                    <tr style="background-color: #c0c0c0; font-weight: bold;">
                        <td colspan="2" class="text-center" style="background-color: #c0c0c0; font-weight: bold;">JUMLAH
                        </td>
                        <td class="text-center">{{ $student->sum('siswa_l') }}</td>
                        <td class="text-center">{{ $student->sum('siswa_p') }}</td>
                        <td class="text-center">{{ $student->sum('siswa_l')+$student->sum('siswa_p') }}</td>
                        <td class="text-center">{{ $student->sum('usia_2') }}</td>
                        <td class="text-center">{{ $student->sum('usia_3') }}</td>
                        <td class="text-center">{{ $student->sum('usia_4') }}</td>
                        <td class="text-center">{{ $student->sum('usia_5') }}</td>
                        <td class="text-center">{{ $student->sum('usia_6') }}</td>
                        <td class="text-center">
                            {{ $student->sum('usia_2')+$student->sum('usia_3')+$student->sum('usia_4')+$student->sum('usia_5')+$student->sum('usia_6') }}
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
                        <td colspan="22" class="kop text-uppercase text-center">
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
                    <td class="text-center">{{ $total_usia_2 }}</td>
                    <td class="text-center">{{ $total_usia_3 }}</td>
                    <td class="text-center">{{ $total_usia_4 }}</td>
                    <td class="text-center">{{ $total_usia_5 }}</td>
                    <td class="text-center">{{ $total_usia_6 }}</td>
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