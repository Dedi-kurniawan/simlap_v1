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
                                <div class="col-lg-6">
                                    <label>GURU MAPEL: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="mapel" name="mapel" title="kolom mapel di larang kosong" required>
                                        <option value="">PILIH MAPEL</option>
                                        @foreach ($subjects as $s)
                                            <option value="{{ $s->nama }}">{{ $s->nama }}</option>
                                        @endforeach
                                    </select>
                                    <div class="error-mapel"></div>
                                </div>
                                <div class="col-lg-6">
                                    <label>ROMBEL SISWA/BK <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off"  name="rombel" id="rombel" placeholder="ROMBEL SISWA/BK..." required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>JUMLAH JAM PER ROMBEL<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off"  name="jam_rombel" id="jam_rombel" placeholder="JUMLAH JAM PER ROMBEL KURIKULUM..."  required/>
                                </div>
                                <div class="col-lg-6">
                                    <label>JUMLAH GURU <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off"  name="jumlah_guru" id="jumlah_guru" placeholder="JUMLAH GURU..."  required/>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>RATA-RATA JAM PERMINGGU<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off"  name="jam_perminggu" id="jam_perminggu" placeholder="RATA-RATA JAM PERMINGGU..."  required/>
                                </div>
                                <div class="col-lg-6">
                                    <label>STATUS KEPEGAWAIAN GURU: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="status_kepegawaian" name="status_kepegawaian[]" multiple required>
                                        <option value="PNS">PNS</option>
                                        <option value="GBD">GBD</option>
                                        <option value="GTT">GTT</option>
                                        <option value="GTY">GTY</option>
                                    </select>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>KETERANGAN: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="keterangan" name="keterangan" placeholder="PILIH KETERANGAN" required>
                                        <option value="">PILIH KETERANGAN</option>
                                        <option value="CUKUP">CUKUP</option>
                                        <option value="KURANG">KURANG</option>
                                        <option value="LEBIH">LEBIH</option>
                                    </select>
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
