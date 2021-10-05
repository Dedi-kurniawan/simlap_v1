<div class="modal fade" id="formShow" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="form_validate">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">NAMA SEKOLAH:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="nama_sekolah_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">NSS:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="nss_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">NPSN:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="npsn_show"></span>
                                    
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">STATUS:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="status_sekolah_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">TAHUN BERDIRI:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="tahun_berdiri_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">AKREDITASI:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="akreditasi_show"></span>
                                <span class="label label-inline label-danger label-bold" id="nilai_akreditasi_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">KECAMATAN:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="kecamatan_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">DESA:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="desa_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">NO TELPON:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="telepon_sekolah_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">EMAIL:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="email_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">KURIKULUM:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="kurikulum_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">KOORDINATOR WILAYAH:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="korwil_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">KEPALA SEKOLAH:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="kepala_sekolah_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">SERTIFIKASI KEPALA SEKOLAH:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="sertifikasi_kepala_sekolah_show"></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-5 col-form-label">NO HP KEPALA SEKOLAH:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext font-weight-bolder" id="hp_kepala_sekolah_show"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">
                        <i class="fas fa-window-close"></i> Keluar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
