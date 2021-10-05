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
                <span class="text-muted font-weight-bold mr-4 text-uppercase">Admin</span>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">

            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body d-flex p-0">
                            <div class="flex-grow-1 p-12 card-rounded bgi-no-repeat d-flex flex-column justify-content-center align-items-start"
                                style="background-color: #FFF4DE; background-position: right bottom; background-size: auto 100%; background-image: url({{ asset('backend/assets/logo/custom-8.svg')}})">
                                <h4 class="text-primary font-weight-bolder m-0">Selamat Datang di SIMLAP</h4>
                                <p class="text-dark-50 my-5 font-size-xl font-weight-bold">Sistem Informasi Manajemen
                                    Laporan,
                                    <br>SIMLAP hadir bertujuan untuk memudahkan sistem pelaporan sekolah setiap bulan
                                </p>
                                {{-- <a href="#" class="btn btn-danger font-weight-bold py-2 px-6">Join SaaS</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!--begin::Advance Table Widget 4-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-body">
                            <form id="form_validate">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label>KATEGORI: <span class="text-danger">*</span></label>
                                        <select class="form-control selectform" id="kategori">
                                            <option value="paud">PAUD</option>
                                            <option value="sd">SD</option>
                                            <option value="smp">SMP</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label>SEMESTER: <span class="text-danger">*</span></label>
                                        <select class="form-control selectform" id="semester">
                                            <option value="1" {{ $report['semester'] == "1" ? "selected" : "" }}>SEMESTER 1</option>
                                            <option value="2" {{ $report['semester'] == "2" ? "selected" : "" }}>SEMESTER 2</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label>BULAN: <span class="text-danger">*</span></label>
                                        <select class="form-control selectform" id="bulan">
                                            <option value="01" {{ $report['bulan'] == "01" ? "selected" : "" }}>JANUARI</option>
                                            <option value="02" {{ $report['bulan'] == "02" ? "selected" : "" }}>FEBRUARI</option>
                                            <option value="03" {{ $report['bulan'] == "03" ? "selected" : "" }}>MARET</option>
                                            <option value="04" {{ $report['bulan'] == "04" ? "selected" : "" }}>APRIL</option>
                                            <option value="05" {{ $report['bulan'] == "05" ? "selected" : "" }}>MEI</option>
                                            <option value="06" {{ $report['bulan'] == "06" ? "selected" : "" }}>JUNI</option>
                                            <option value="07" {{ $report['bulan'] == "07" ? "selected" : "" }}>JULI</option>
                                            <option value="08" {{ $report['bulan'] == "08" ? "selected" : "" }}>AGUSTUS</option>
                                            <option value="09" {{ $report['bulan'] == "09" ? "selected" : "" }}>SEPTEMBER</option>
                                            <option value="10" {{ $report['bulan'] == "10" ? "selected" : "" }}>OKTOBER</option>
                                            <option value="11" {{ $report['bulan'] == "11" ? "selected" : "" }}>NOVEMBER</option>
                                            <option value="12" {{ $report['bulan'] == "12" ? "selected" : "" }}>DESEMBER</option>
                                        </select>
                                    </div>
                                    <div class="col-3">              
                                        <label>TAHUN: <span class="text-danger">*</span></label>                     
                                        <select class="form-control selectform" id="tahun">
                                            @foreach ($settings as $s)
                                                <option value="{{ $s->tahun }}" {{ $report['tahun'] == $s->tahun ? "selected" : "" }}>{{ $s->tahun }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label>AKSI: <span class="text-danger">*</span></label>
                                        <div></div>   
                                        <button type="button" class="btn btn-success font-weight-bolder font-size-sm btn-block" id="status_filter">
                                            <span class="svg-icon svg-icon-md svg-icon-white">
                                                <i class="fa fa-search"></i>
                                            </span>cari
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    <!--begin::Advance Table Widget 4-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark title-report">LAPORAN SEKOLAH</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">GENERATE LAPORAN SEKOLAH
                                </span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <table class="table nowrap table-sm table-head-custom table-head-bg table-vertical-center" id="datatable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA SEKOLAH</th>
                                        <th>TENAGA PEDIDIK</th>
                                        <th>PESERTA DIDIK</th>
                                        <th>TENAGA KEPENDIDIKAN</th>
                                        <th>ANALISIS KEBUTUHAN GURU</th>
                                        <th>SARANA DAN PRASARAN</th>
                                    </tr>
                                </thead>
                                <tbody class="font-size-sm">
                                    
                                </tbody>
                            </table>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 4-->
                </div>
            </div>
            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection
@push('scripts')
    <script src="{{ asset('backend/simlap/js/superadmin/dashboards.js') }}?v{{ date('ymdhis') }}"></script>
@endpush
