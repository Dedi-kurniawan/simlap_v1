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
        <h3 class="kop text-uppercase">II. KONDISI SARANA DAN PRASARAN</h3>
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