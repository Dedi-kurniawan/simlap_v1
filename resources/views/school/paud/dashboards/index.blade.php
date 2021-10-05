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
                <div class="col-lg-4">
                    <!--begin::Mixed Widget 14-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title font-weight-bolder">LAPORAN</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <div class="flex-grow-1">
                                <div id="kt_mixed_widget_14_chart" style="height: 200px"></div>
                            </div>
                            <div class="pt-5">
                                @if ($setting['status'] == "aktif")
                                    @if ($report['status'] == 'ada')
                                        @if ($report['teacher'] == 0)
                                            <a href="{{ route('sd.tenaga-pendidik.index') }}" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">TENAGA PENDIDIK</a>
                                        @elseif($report['employee'] == 0)
                                            <a href="{{ route('sd.tenaga-kependidikan.index') }}" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">TENAGA KEPENDIDIKAN</a>
                                        @elseif($report['need'] == 0)
                                            <a href="{{ route('sd.kebutuhan-guru.index') }}" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">ANALISIS KEBUTUHAN GURU</a>
                                        @elseif($report['student'] == 0)
                                            <a href="{{ route('sd.peserta-didik.index') }}" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">PESERTA DIDIK</a>
                                        @elseif($report['facility'] == 0)
                                            <a href="{{ route('sd.sarana-prasarana.index') }}" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">SARANA & PRASARANA</a>
                                        @else
                                            <a href="#" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">LAPORAN SELESAI</a>
                                        @endif
                                    @else
                                        <a href="{{ route('sd.tenaga-pendidik.index') }}" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">TENAGA PENDIDIK</a>
                                    @endif
                                @else
                                    <a href="#" class="btn btn-danger btn-shadow-hover font-weight-bolder w-100 py-3">TIDAK ADA LAPORAN AKTIF</a>
                                @endif                                
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 14-->
                </div>
                <div class="col-lg-8">
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <h3 class="card-title font-weight-bolder text-dark">GENERATE LAPORAN {{ $report['bulan'] }} {{ $report['tahun'] }}</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-bar {{ $report['teacher'] == '1' ? 'bg-success' : 'bg-danger' }} align-self-stretch"></span>
                                <!--end::Bullet-->
                                <div class="symbol symbol-40 symbol-light-primary mr-5 ml-5">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-xl">
                                            <i class="fa fa-chalkboard-teacher text-primary"></i>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">TENAGA PENDIDIK</a>
                                </div>
                                <!--end::Text-->
                                <!--begin::Dropdown-->
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="{{ $report['teacher'] == '1' ? 'sudah di generate' : 'belum di generate' }}">
                                    <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-check {{ $report['teacher'] == '1' ? 'text-success' : '' }}"></i>
                                    </a>
                                </div>
                                <!--end::Dropdown-->
                            </div>
                            <div class="separator separator-dashed my-5"></div>
                            <div class="d-flex align-items-center mt-6">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-bar {{ $report['employee'] == '1' ? 'bg-success' : 'bg-danger' }} align-self-stretch"></span>
                                <!--end::Bullet-->
                                <div class="symbol symbol-40 symbol-light-primary mr-5 ml-5">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-xl">
                                            <i class="fa fa-user-friends text-primary"></i>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">TENAGA KEPENDIDIKAN</a>
                                </div>
                                <!--end::Text-->
                                <!--begin::Dropdown-->
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="{{ $report['employee'] == '1' ? 'sudah di generate' : 'belum di generate' }}">
                                    <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-check {{ $report['employee'] == '1' ? 'text-success' : '' }}"></i>
                                    </a>
                                </div>
                                <!--end::Dropdown-->
                            </div>
                            <div class="separator separator-dashed my-5"></div>
                            <div class="d-flex align-items-center mt-6">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-bar {{ $report['need'] == '1' ? 'bg-success' : 'bg-danger' }} align-self-stretch"></span>
                                <!--end::Bullet-->
                                <div class="symbol symbol-40 symbol-light-primary mr-5 ml-5">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-xl">
                                            <i class="fa fa-user-cog text-primary"></i>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">ANALISIS KEBUTUHAN GURU</a>
                                </div>
                                <!--end::Text-->
                                <!--begin::Dropdown-->
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="{{ $report['need'] == '1' ? 'sudah di generate' : 'belum di generate' }}">
                                    <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-check {{ $report['need'] == '1' ? 'text-success' : '' }}"></i>
                                    </a>
                                </div>
                                <!--end::Dropdown-->
                            </div>
                            <div class="separator separator-dashed my-5"></div>
                            <div class="d-flex align-items-center mt-6">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-bar {{ $report['student'] == '1' ? 'bg-success' : 'bg-danger' }} align-self-stretch"></span>
                                <!--end::Bullet-->
                                <div class="symbol symbol-40 symbol-light-primary mr-5 ml-5">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-xl">
                                            <i class="fa fa-users text-primary"></i>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">PESERTA DIDIK</a>
                                </div>
                                <!--end::Text-->
                                <!--begin::Dropdown-->
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="{{ $report['student'] == '1' ? 'sudah di generate' : 'belum di generate' }}">
                                    <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-check {{ $report['student'] == '1' ? 'text-success' : '' }}"></i>
                                    </a>
                                </div>
                                <!--end::Dropdown-->
                            </div>
                            <div class="separator separator-dashed my-5"></div>
                            <div class="d-flex align-items-center mt-6">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-bar {{ $report['facility'] == '1' ? 'bg-success' : 'bg-danger' }} align-self-stretch"></span>
                                <!--end::Bullet-->
                                <div class="symbol symbol-40 symbol-light-primary mr-5 ml-5">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-xl">
                                            <i class="fa fa-building text-primary"></i>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">SARANA & PRASARANA</a>
                                </div>
                                <!--end::Text-->
                                <!--begin::Dropdown-->
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="{{ $report['facility'] == '1' ? 'sudah di generate' : 'belum di generate' }}">
                                    <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-check {{ $report['facility'] == '1' ? 'text-success' : '' }}"></i>
                                    </a>
                                </div>
                                <!--end::Dropdown-->
                            </div>
                        </div>
                        <!--end::Body-->
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
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>SEMESTER: <span class="text-danger">*</span></label>
                                        <select class="form-control selectform" id="semester">
                                            <option value="1" {{ $report['semester'] == "1" ? "selected" : "" }}>SEMESTER 1</option>
                                            <option value="2" {{ $report['semester'] == "2" ? "selected" : "" }}>SEMESTER 2</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
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
                                    <div class="col-12 col-lg-3 col-md-3">              
                                        <label>TAHUN: <span class="text-danger">*</span></label>                     
                                        <select class="form-control selectform" id="tahun">
                                            @foreach ($settings as $s)
                                                <option value="{{ $s->tahun }}" {{ $report['tahun'] == $s->tahun ? "selected" : "" }}>{{ $s->tahun }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
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
                        <div class="card-footer">
                            <span class="label label-rounded label-success mr-2">TP</span> <small class="mr-2">TENAGA PENDIDIK</small> 
                            <span class="label label-rounded label-primary mr-2">TK</span> <small class="mr-2">TENAGA KEPENDIDIK</small>
                            <span class="label label-rounded label-warning mr-2">PD</span> <small class="mr-2">PESERTA DIDIK</small>
                            <span class="label label-rounded label-dark mr-2">AKG</span> <small class="mr-2">ANALISIS KEBUTUHAN GURU</small>
                            <span class="label label-rounded label-danger mr-2">SDP</span> <small class="mr-2">SARANA DAN PRASARAN</small>
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
                            <div class="row">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark title-report text-uppercase">LAPORAN SEKOLAH</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">GENERATE LAPORAN SEKOLAH</span>
                                </h3>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <table class="table nowrap table-sm table-head-custom table-head-bg table-vertical-center" id="datatable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA SEKOLAH</th>
                                        <th title="TENAGA PEDIDIK">TP</th>
                                        <th title="TENAGA KEPENDIDIKAN">TK</th>
                                        <th title="PESERTA DIDIK">PD</th>
                                        <th title="ANALISIS KEBUTUHAN GURU">AKG</th>
                                        <th title="SARANA DAN PRASARAN">SDP</th>
                                        <th title="TANGGAL MULAI">TANGGAL MULAI</th>
                                        <th title="TANGGAL SELESAI">TANGGAL SELESAI</th>
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
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection
@push('scripts')
<script>
    var element = document.getElementById("kt_mixed_widget_14_chart");
    var options_report = {
        series: [@json($report['total_value'])],
        chart: {
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: "65%"
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        show: false,
                        fontWeight: '700'
                    },
                    value: {
                        color: ['gray']['gray-700'],
                        fontSize: "30px",
                        fontWeight: '700',
                        offsetY: 12,
                        show: true,
                        formatter: function (val) {
                            return val + '%';
                        }
                    }
                },
                track: {
                    strokeWidth: '100%'
                }
            }
        },
        stroke: {
            lineCap: "round",
        },
        labels: ["Progress"]
    };

    var chart_report = new ApexCharts(element, options_report);
    chart_report.render();
</script>
<script src="{{ asset('backend/simlap/js/adminpaud/dashboards.js') }}?v{{ date('ymdhis') }}"></script>
@endpush
