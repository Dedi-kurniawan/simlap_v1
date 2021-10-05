<div class="modal fade" id="formModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
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
                                    <label>SEKOLAH: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="nama_sekolah" name="school_id" title="kolom nama sekolah di larang kosong" required>
                                        <option value="">PILIH SEKOLAH</option>
                                        @foreach ($schools as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama_sekolah }}</option>
                                        @endforeach
                                    </select>
                                    <div class="error-school_id"></div>
                                </div>
                                <div class="col-lg-6">
                                    <label>NAMA OPERATOR:<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" autocomplete="off"  name="name" id="name" placeholder="NAMA OPERATOR..." required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>EMAIL:<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" autocomplete="off"  name="email" id="email" placeholder="EMAIL..."  required/>
                                </div>
                                <div class="col-lg-6">
                                    <label>PASSWORD: </label>
                                    <input type="password" class="form-control" autocomplete="off" name="password" id="password" placeholder="PASSWORD..."/>
                                    <small>*jika password di kosongkan maka password : "password123"</small>
                                </div>                                
                            </div>
                            @if (Auth::user()->role_id == '1')
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>OPERATOR: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" name="role_id" id="role_id" required title="kolom operator di larang kosong">
                                        <option value="">PILIH OPERATOR</option>
                                        <option value="2">OPERATOR PAUD</option>
                                        <option value="3">OPERATOR SD</option>
                                        <option value="4">OPERATOR SMP</option>
                                    </select>
                                </div>
                            </div>
                            @endif
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
