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
                <span class="text-muted font-weight-bold mr-4">{{ $bcrum['name-school'] }}</span>
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
                        <span class="d-block text-muted pt-2 font-size-sm">Cetak {{ $bcrum['title'] }}</span></h3>
                    </div>
                    
                </div>
                <div class="card-body">
                    <form id="form_validate">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>BULAN: <span class="text-danger">*</span></label>
                                <select class="form-control selectform" id="bulan" name="bulan" title="kolom bulan di larang kosong" required>
                                    <option value="">PILIH BULAN</option>
                                    <option value="01" {{ $bcrum['report']['bulan-save'] == "01" ? "selected" : "" }}>JANUARI</option>
                                    <option value="02" {{ $bcrum['report']['bulan-save'] == "02" ? "selected" : "" }}>FEBRUARI</option>
                                    <option value="03" {{ $bcrum['report']['bulan-save'] == "03" ? "selected" : "" }}>MARET</option>
                                    <option value="04" {{ $bcrum['report']['bulan-save'] == "04" ? "selected" : "" }}>APRIL</option>
                                    <option value="05" {{ $bcrum['report']['bulan-save'] == "05" ? "selected" : "" }}>MEI</option>
                                    <option value="06" {{ $bcrum['report']['bulan-save'] == "06" ? "selected" : "" }}>JUNI</option>
                                    <option value="07" {{ $bcrum['report']['bulan-save'] == "07" ? "selected" : "" }}>JULI</option>
                                    <option value="08" {{ $bcrum['report']['bulan-save'] == "08" ? "selected" : "" }}>AGUSTUS</option>
                                    <option value="09" {{ $bcrum['report']['bulan-save'] == "09" ? "selected" : "" }}>SEPTEMBER</option>
                                    <option value="10" {{ $bcrum['report']['bulan-save'] == "10" ? "selected" : "" }}>OKTOBER</option>
                                    <option value="11" {{ $bcrum['report']['bulan-save'] == "11" ? "selected" : "" }}>NOVEMBER</option>
                                    <option value="12" {{ $bcrum['report']['bulan-save'] == "12" ? "selected" : "" }}>DESEMBER</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>TAHUN: <span class="text-danger">*</span></label>
                                <select class="form-control selectform" id="tahun" name="tahun" title="kolom tahun di larang kosong" required>
                                    <option value="">PILIH TAHUN</option>
                                    @foreach ($settings as $s)
                                        <option value="{{ $s->tahun }}" {{ $bcrum['report']['tahun'] == $s->tahun ? "selected" : "" }}>{{ $s->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>AKSI: <span class="text-danger">*</span></label>
                                <button type="button" onclick="printReport()" class="btn btn-primary btn-block">CETAK LAPORAN</button>
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
<script>
function printReport(){
    var bulan = $("#bulan").val();
    var tahun = $("#tahun").val();
    var title = "LAPORAN BULAN :"+bulan+" "+tahun;
    var url = HOST_URL + '/paud/laporan/show?bulan='+bulan+'&tahun='+tahun;
    window.open(url, title, "height=650,width=1024,left=150,scrollbars=yes");
    return false;
} 
</script>
@endpush