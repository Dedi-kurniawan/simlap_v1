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
                <span class="text-muted font-weight-bold mr-4">BENGKULU UTARA</span>
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
            @if (Auth::user()->role_id == '1')
                <div class="card mb-5">
                    <!--begin::Header-->
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-4">
                                <label>KATEGORI: <span class="text-danger">*</span></label>
                                <select class="form-control select2_filter" id="kategori_filter">
                                    <option value="2">PAUD</option>
                                    <option value="3">SD</option>
                                    <option value="4">SMP</option>
                                    <option value="">SEMUA</option>
                                </select>
                                <small class="error-filter"></small>
                            </div>
                            <div class="col-4">
                                <label>KOORDINATOR: <span class="text-danger">*</span></label>
                                <select class="form-control select2_filter" id="koordinator_filter">
                                    <option value="">SEMUA</option>
                                    @foreach ($koordinators as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label>AKSI: <span class="text-danger">*</span></label>
                                <div></div>   
                                <button type="button" class="btn btn-success font-weight-bolder font-size-sm btn-block" id="button_filter">
                                    <span class="svg-icon svg-icon-md svg-icon-white">
                                        <i class="fa fa-search"></i>
                                    </span>cari
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ $bcrum['title'] }}
                        <span class="d-block text-muted pt-2 font-size-sm">Menampilkan {{ $bcrum['title'] }}</span></h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-success font-weight-bolder mr-3" onclick="importData()">
                            <span class="svg-icon svg-icon-md">
                                <i class="fa fa-file-excel"></i>
                            </span>Import Excel
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
                                    <th>NAMA</th>
                                    <th>NSS</th>
                                    <th>NPSN</th>
                                    <th>STATUS</th>
                                    <th>TAHUN BERDIRI</th>
                                    <th>AKREDITASI / NILAI</th>
                                    <th>KECAMATAN</th>
                                    <th>DESA</th>
                                    <th>NO TELP</th>
                                    <th>EMAIL</th>
                                    <th>KORWIL</th>
                                    <th>KEPALA SEKOLAH</th>
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
@include('admin.master.schools._form')
@include('admin.master.schools._show')
@include('admin.master.schools._import')
@endsection
@push('scripts')
    <script src="{{ asset('backend/simlap/js/master/schools.js') }}?v{{ date('ymdhis') }}"></script>
@endpush