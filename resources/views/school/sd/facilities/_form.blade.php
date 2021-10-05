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
                                <div class="col-lg-12">
                                    <label>URAIAN: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="uraian" name="uraian" title="kolom uraian di larang kosong" required>
                                        <option value="">PILIH URAIAN</option>
                                        @foreach ($descriptions as $d)
                                            <option value="{{ $d->nama }}">{{ $d->nama }}</option>
                                        @endforeach
                                    </select>
                                    <div class="error-uraian"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h3 class="font-size-lg text-dark font-weight-bold mb-6">KONDISI:</h3>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label>BAIK<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="baik" id="baik" placeholder="BAIK..."  required/>
                                </div>
                                <div class="col-lg-3">
                                    <label>RUSAK RINGAN<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="rusak_ringan" id="rusak_ringan" placeholder="RUSAK RINGAN..."  required/>
                                </div>
                                <div class="col-lg-3">
                                    <label>RUSAK SEDANG<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="rusak_sedang" id="rusak_sedang" placeholder="RUSAK SEDANG..."  required/>
                                </div>
                                <div class="col-lg-3">
                                    <label>RUSAK BERAT<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="rusak_berat" id="rusak_berat" placeholder="RUSAK BERAT..."  required/>
                                </div>                                                           
                            </div>
                            <div class="col-12">
                                <h3 class="font-size-lg text-dark font-weight-bold mb-6">KEBUTUHAN:</h3>
                            </div>
                            <div class="for-group row">
                                <div class="col-lg-12">
                                    <label>KEBUTUHAN<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="kebutuhan" id="kebutuhan" placeholder="KEBUTUHAN..."  required/>
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
