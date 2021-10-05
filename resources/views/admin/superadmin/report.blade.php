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
                <span class="text-muted font-weight-bold mr-4">SEKOLAH BENGKULU UTARA</span>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ $bcrum['title'] }}
                        <span class="d-block text-muted pt-2 font-size-sm">Cetak {{ $bcrum['title'] }}</span></h3>
                    </div>
                    
                </div>
                <div class="card-body">
                    <form id="form_validate">
                        <div class="form-group row">
                            <div class="col-2">
                                <label>KATEGORI:</label>
                                <select class="form-control select2_filter" id="kategori_filter">
                                    <option value="2">PAUD</option>
                                    <option value="3">SD</option>
                                    <option value="4">SMP</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label>SEKOLAH: <span class="text-danger">*</span></label>
                                <select class="form-control selectform" id="school_id" name="sekolah" title="kolom sekolah dilarang kosong" required>
                                    <option value="">PILIH SEKOLAH</option>
                                    
                                </select>
                            </div>
                            <div class="col-2">
                                <label>BULAN: <span class="text-danger">*</span></label>
                                <select class="form-control selectform" id="bulan" name="bulan" title="kolom bulan di larang kosong" required>
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
                                    @foreach ($settings as $s)
                                        <option value="{{ $s->tahun }}">{{ $s->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label>AKSI: <span class="text-danger">*</span></label>
                                <div></div>
                                <button type="button" onclick="printReport()" class="btn btn-primary"><i class="fa fa-print"></i> CETAK LAPORAN</button>
                            </div>
                        </div>
                    </form>
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
    <script src="{{ asset('backend/simlap/js/superadmin/reports.js') }}?v{{ date('ymdhis') }}"></script>
@endpush