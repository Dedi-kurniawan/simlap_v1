<div class="modal fade" id="formModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                        <div class="mb-2">
                            <div class="form-group">
                                <div class="col-12">
                                    <h3 class="font-size-sm font-italic mb-10 text-danger">
                                        Kolom yang memiliki * wajib di isi
                                    </h3>
                                </div>
                            </div>
                            <input type="hidden" id="id_edit">
                            <div class="method-hidden"></div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label>SEMESTER: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="semester" name="semester" title="kolom semester di larang kosong" required>
                                        <option value="">PILIH SEMESTER</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <div class="error-semester"></div>
                                </div>
                                <div class="col-lg-4">
                                    <label>SEKOLAH: <span class="text-danger">*</span></label>
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
                                    <div class="error-bulan"></div>
                                </div>
                                <div class="col-lg-3">
                                    <label>TAHUN:<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control datepicker" autocomplete="off" name="tahun" id="tahun" placeholder="TAHUN..." required/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">
                        <i class="fas fa-window-close"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary font-weight-bold" id="submitData"></button>
                </div>
            </form>
        </div>
    </div>
</div>
