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
                                    <label>UMUR 2<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_2" id="usia_2" placeholder="UMUR 2..."  required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>UMUR 3<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_3" id="usia_3" placeholder="UMUR 3..."  required/>
                                </div> 
                                <div class="col-lg-4">
                                    <label>UMUR 4<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_4" id="usia_4" placeholder="UMUR 4..."  required/>
                                </div>                                                          
                            </div>
                            <div class="form-group row">                                
                                <div class="col-lg-4">
                                    <label>UMUR 5<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_5" id="usia_5" placeholder="UMUR 5..."  required/>
                                </div>
                                <div class="col-lg-4">
                                    <label>UMUR 6<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" autocomplete="off" value="0"  name="usia_6" id="usia_6" placeholder="UMUR 6..."  required/>
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
