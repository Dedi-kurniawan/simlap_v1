@extends('layouts.backend.master')
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $bcrum['name-second'] }}</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">SMP BENGKULU UTARA</span>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <form id="form_validate">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>SEKOLAH: <span class="text-danger">*</span></label>
                            <select class="form-control selectform" id="school_id" name="sekolah" title="kolom sekolah dilarang kosong" required>
                                <option value="">PILIH SEKOLAH</option>
                                @foreach ($schools as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama_sekolah }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <label>BULAN: <span class="text-danger">*</span></label>
                            <select class="form-control selectform" id="bulan" name="bulan" title="bulan sekolah dilarang kosong" required>
                                <option value="">PILIH BULAN</option>
                                <option value="01">JANUARI</option>
                                <option value="02">FEBRUARI</option>
                                <option value="03">MARET</option>
                                <option value="04">APRIL</option>
                                <option value="05">MEI</option>
                                <option value="06">JUNI</option>
                                <option value="07">JULI</option>
                                <option value="08">AGUSTUS</option>
                                <option value="09">SEPTEMBER</option>
                                <option value="10">OKTOBER</option>
                                <option value="11">NOVEMBER</option>
                                <option value="12">DESEMBER</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label>TAHUN: <span class="text-danger">*</span></label>
                            <select class="form-control selectform" id="tahun" name="tahun" title="kolom tahun di larang kosong" required>
                                <option value="">PILIH TAHUN</option>
                                @foreach ($tahun as $t)
                                    <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>AKSI: <span class="text-danger">*</span></label>
                            <div></div>
                            <button type="submit" id="filter_data" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Data</button>
                            <button type="button" onclick="printReport()" class="btn btn-dark"><i class="fa fa-print"></i> CETAK LAPORAN</button>
                        </div>
                    </div>
                </form>
                </div>
            
            </div>
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ $bcrum['title'] }}
                        <span class="d-block text-muted pt-2 font-size-sm">Menampilkan {{ $bcrum['title'] }}</span></h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered" id="datatable">
                        <thead class="bg-secondary text-center">
                        <tr>
                            <th rowspan="2">#</th>
                            <th rowspan="2">KELAS</th>
                            <th colspan="3">JMLH SISWA BERDASARKAN KELAS</th>
                            <th colspan="10">JMLH SISWA BERDASARKAN UMUR</th>
                            <th colspan="7">JMLH SISWA BERDASARKAN AGAMA</th>
                          </tr>
                          <tr>
                            <th>L</th>
                            <th>P</th>
                            <th>JLH</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>JMLH</th>
                            <th>ISLAM</th>
                            <th>KATOLIK</th>
                            <th>PROTESTAN</th>
                            <th>HINDU</th>
                            <th>BUDHA</th>
                            <th>LAIN-LAIN</th>
                            <th>JMLH</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection
@push('scripts')
    <script src="{{ asset('backend/simlap/js/adminsmp/students.js') }}?v{{ date('ymdhis') }}"></script>
@endpush