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
                <span class="text-muted font-weight-bold mr-4 text-uppercase">{{ $bcrum['name-school'] }}</span>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Daterange-->
                <a href="#" class="btn btn-sm btn-dark font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Informasi Laporan" data-placement="left">
                    <span class="text-white font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">Laporan {{ $bcrum['report']['status'] }} : {{ $bcrum['report']['bulan'] }} {{ $bcrum['report']['tahun'] }}</span>
                </a>
                <!--end::Daterange-->
            </div>
            <!--end::Toolbar-->
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
                        <span class="d-block text-muted pt-2 font-size-sm">Menampilkan {{ $bcrum['title'] }}</span></h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        @if ($bcrum['report']['status'] == "aktif")
                            <button class="btn btn-info font-weight-bolder mr-2" onclick="generateReport()">
                                <span class="svg-icon svg-icon-md">
                                    <i class="fa fa-file"></i>
                                </span>Generate Laporan {{ $bcrum['report']['bulan'] }} {{ $bcrum['report']['tahun'] }}
                            </button>
                        @endif                        
                        <button class="btn btn-secondary font-weight-bolder mr-2" id="datatable_refresh">
                            <span class="svg-icon svg-icon-md">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </span>Refresh
                        </button>
                        <button class="btn btn-primary font-weight-bolder" onclick="createData()">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Data Baru (ALT+N)
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive-sm">
                        <table class="table nowrap table-sm table-head-custom table-head-bg table-vertical-center" id="datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>URAIAN</th>
                                    <th>KONDISI BAIK</th>
                                    <th>RUSAK RINGAN</th>
                                    <th>RUSAK SEDANG</th>
                                    <th>RUSAK BERAT</th>
                                    <th>JUMLAH</th>
                                    <th>kebutuhan</th>    
                                    <th>keterangan</th>                               
                                </tr>
                            </thead>
                            <tbody class="font-size-sm">
                                
                            </tbody>
                        </table>
                    </div>
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
@include('school.sd.facilities._form')
@include('school.sd.facilities._report')
@endsection
@push('scripts')
    <script src="{{ asset('backend/simlap/js/sd/facilities.js') }}?v{{ date('ymdhis') }}"></script>
@endpush