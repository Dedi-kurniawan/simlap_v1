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
                                    <label>KELAS: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="room_id" name="room_id" title="kolom kelas di larang kosong" required>
                                        <option value="">PILIH KELAS</option>
                                        @foreach ($rooms as $r)
                                            <option value="{{ $r->id }}">{{ $r->kelas }}</option>
                                        @endforeach
                                    </select>
                                    <div class="error-room_id"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h3 class="font-size-lg text-dark font-weight-bold mb-6">JUMLAH SISWA BERDASARKAN KELAS:</h3>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>LAKI-LAKI<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="siswa_l" id="siswa_l" placeholder="JUMLAH JAM PER ROMBEL KURIKULUM..."  required/>
                                </div>
                                <div class="col-lg-6">
                                    <label>PEREMPUAN <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="siswa_p" id="siswa_p" placeholder="JUMLAH GURU..."  required/>
                                </div>                                
                            </div>
                            <div class="col-12">
                                <h3 class="font-size-lg text-dark font-weight-bold mb-6">JUMLAH SISWA BERDASARKAN UMUR:</h3>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>UMUR 11<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_11" id="usia_11" placeholder="UMUR 11..."  required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>UMUR 12<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_12" id="usia_12" placeholder="UMUR 12..."  required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>UMUR 13<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_13" id="usia_13" placeholder="UMUR 13..."  required/>
                                </div>                                                           
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>UMUR 14<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_14" id="usia_14" placeholder="UMUR 14..."  required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>UMUR 15<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_15" id="usia_15" placeholder="UMUR 15..."  required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>UMUR 16<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_16" id="usia_16" placeholder="UMUR 16..."  required/>
                                </div>                                                           
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>UMUR 17<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_17" id="usia_17" placeholder="UMUR 17..."  required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>UMUR 18<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_18" id="usia_18" placeholder="UMUR 18..."  required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>UMUR 19<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_19" id="usia_19" placeholder="UMUR 16..."  required/>
                                </div>                                                           
                            </div>
                            <div class="col-12">
                                <h3 class="font-size-lg text-dark font-weight-bold mb-6">JUMLAH SISWA BERDASARKAN AGAMA:</h3>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>ISLAM<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="islam" id="islam" placeholder="ISLAM..."  required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>KATOLIK<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="katolik" id="katolik" placeholder="KATOLIK..."  required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>PROTESTAN<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="protestan" id="protestan" placeholder="PROTESTAN..."  required/>
                                </div>                                                           
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>HINDU<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="hindu" id="hindu" placeholder="HINDU..."  required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>BUDHA<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="budha" id="budha" placeholder="BUDHA..."  required/>
                                </div>      
                                <div class="col-lg-4">
                                    <label>LAINNYA<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="lain" id="lain" placeholder="LAINNYA..."  required/>
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
