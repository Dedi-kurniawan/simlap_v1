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
                <span class="text-muted font-weight-bold mr-4">PAUD BENGKULU UTARA</span>
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
                            <div class="col-lg-3">
                                <label>SEKOLAH: <span class="text-danger">*</span></label>
                                <select class="form-control selectform" id="school_id" name="sekolah" title="kolom sekolah dilarang kosong" required>
                                    <option value="">PILIH SEKOLAH</option>
                                    @foreach ($schools as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama_sekolah }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
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
                            <div class="col-lg-3">
                                <label>TAHUN: <span class="text-danger">*</span></label>
                                <select class="form-control selectform" id="tahun" name="tahun" title="kolom tahun di larang kosong" required>
                                    <option value="">PILIH TAHUN</option>
                                    @foreach ($settings as $s)
                                        <option value="{{ $s->tahun }}">{{ $s->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>AKSI: <span class="text-danger">*</span></label>
                                <div></div>
                                <button type="button" onclick="printReport()" class="btn btn-primary"><i class="fa fa-print"></i> CETAK LAPORAN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--end::Card-->
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Reset {{ $bcrum['title'] }}
                        <span class="d-block text-muted pt-2 font-size-sm">Reset {{ $bcrum['title'] }}</span></h3>
                    </div>
                    
                </div>
                <div class="card-body">
                    <form id="form_validate_reset">
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label>SEKOLAH: <span class="text-danger">*</span></label>
                                <select class="form-control selectform" id="school_id_reset" name="sekolah" title="kolom sekolah dilarang kosong" required>
                                    <option value="">PILIH SEKOLAH</option>
                                    @foreach ($schools as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama_sekolah }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label>BULAN: <span class="text-danger">*</span></label>
                                <select class="form-control selectform" id="bulan_reset" name="bulan" title="kolom bulan di larang kosong" required>
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
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label>TAHUN: <span class="text-danger">*</span></label>
                                <select class="form-control selectform" id="tahun_reset" name="tahun" title="kolom tahun di larang kosong" required>
                                    <option value="">PILIH TAHUN</option>
                                    @foreach ($settings as $s)
                                        <option value="{{ $s->tahun }}">{{ $s->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label>SEMESTER: <span class="text-danger">*</span></label>
                                <select class="form-control selectform" id="semester" name="semester" title="kolom semester di larang kosong" required>
                                    <option value="1">SEMESTER 1</option>
                                    <option value="2">SEMESTER 2</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label>LAPORAN: <span class="text-danger">*</span></label>
                                <select class="form-control selectform" id="laporan" name="laporan" title="kolom laporan di larang kosong" required>
                                    <option value="teacher">TENAGA PENDIDIK</option>
                                    <option value="employee">TENAGA KEPENDIDIKAN</option>
                                    <option value="student">PESERTA DIDIK</option>
                                    <option value="need">ANALISIS KEBUTUHAN GURU</option>
                                    <option value="facility">SARANA PRASARANA</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label>AKSI: <span class="text-danger">*</span></label>
                                <div></div>
                                <button type="button" onclick="resetReport()" class="btn btn-info"><i class="fa fa-key"></i> RESET LAPORAN</button>
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
@include('admin.paud.modal._reset')
@endsection
@push('scripts')
    <script src="{{ asset('backend/simlap/js/adminpaud/reports.js') }}?v{{ date('ymdhis') }}"></script>
@endpush