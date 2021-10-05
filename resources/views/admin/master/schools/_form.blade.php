<div class="modal fade" id="formModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
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
                                <div class="col-lg-4">
                                    <label>NAMA SEKOLAH: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" autocomplete="off" maxlength="255" required name="nama_sekolah" id="nama_sekolah" placeholder="NAMA SEKOLAH..." />
                                </div>
                                <div class="col-lg-4">
                                    <label>NSS: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nss" id="nss" required placeholder="NSS..."  />
                                </div>
                                <div class="col-lg-4">
                                    <label>NPSN: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" autocomplete="on" name="npsn" id="npsn" required placeholder="NPSN..." />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <label>STATUS SEKOLAH: <span class="text-danger">*</span></label>
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" class="negeri" name="status_sekolah" id="status_sekolah" required value="NEGERI"/>
                                            <span></span>
                                            NEGERI
                                        </label>
                                        <label class="radio">
                                            <input type="radio" class="swasta" name="status_sekolah" value="SWASTA"/>
                                            <span></span>
                                            SWASTA
                                        </label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label>TAHUN BERDIRI: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control date_picker" autocomplete="on" name="tahun_berdiri" id="tahun_berdiri" required placeholder="TAHUN BERDIRI..." />
                                </div>
                                <div class="col-3">
                                    <label>AKREDITASI:<span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="akreditasi" name="akreditasi" required>
                                        <option value="">PILIH AKREDITASI</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="Belum Akreditasi">Belum Akreditasi</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label>NILAI AKREDITASI: </label>
                                    <input type="number" class="form-control" autocomplete="on" name="nilai_akreditasi" id="nilai_akreditasi" required placeholder="NILAI AKREDITASI..." />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>KECAMATAN:<span class="text-danger">*</span></label>
                                    <select class="form-control selectform kecamatan" id="district_id" title="kolom kecamatan di larang kosong" name="district_id" required>
                                        <option value="">PILIH KECAMATAN</option>
                                        @foreach ($districts as $d)
                                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>DESA:<span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="village_id" title="kolom desa di larang kosong" name="village_id" required>
                                        <option value="">PILIH DESA</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>ALAMAT SEKOLAH: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="alamat_sekolah" id="alamat_sekolah" placeholder="ALAMAT SEKOLAH..."  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>TELEPON SEKOLAH: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="telepon_sekolah" id="telepon_sekolah" placeholder="TELEPON SEKOLAH..."  />
                                </div>
                                <div class="col-lg-4">
                                    <label>EMAIL SEKOLAH: <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" required name="email" id="email" placeholder="EMAIL SEKOLAH..."  />
                                </div>
                                <div class="col-lg-4">
                                    <label>KURIKULUM:<span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="kurikulum" name="kurikulum" required>
                                        <option value="">PILIH KURIKULUM</option>
                                        <option value="K13">K13</option>
                                        <option value="KTSP">KTSP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>KOORDINATOR:<span class="text-danger">*</span></label>
                                    <select class="form-control selectform koordinator" id="koordinator_id" title="kolom koordinator di larang kosong" name="koordinator_id" required>
                                        <option value="">PILIH KOORDINATOR</option>
                                        @foreach ($koordinators as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>KEPALA SEKOLAH: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="kepala_sekolah" id="kepala_sekolah" placeholder="KEPALA SEKOLAH..."  />
                                </div>
                                <div class="col-lg-4">
                                    <label>NIP KEPALA SEKOLAH: </label>
                                    <input type="text" class="form-control" required name="nip_kepala_sekolah" id="nip_kepala_sekolah" placeholder="KEPALA SEKOLAH..."  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4">
                                    <label>SERTIFIKASI: <span class="text-danger">*</span></label>
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" class="sudah" name="sertifikasi_kepala_sekolah" id="sertifikasi_kepala_sekolah" required value="SUDAH"/>
                                            <span></span>
                                            SUDAH
                                        </label>
                                        <label class="radio">
                                            <input type="radio" class="belum" name="sertifikasi_kepala_sekolah" value="BELUM"/>
                                            <span></span>
                                            BELUM
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>NO HANDPHONE KEPALA SEKOLAH: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="hp_kepala_sekolah" id="hp_kepala_sekolah" placeholder="NO HANDPHONE SEKOLAH..."  />
                                </div>
                                <div class="col-4">
                                    <label>KATEGORI:</label>
                                    <select class="form-control selectform" id="role_id" name="role_id" required title="kolom kategori sekolah di larang kosong">
                                        <option value="">PILIH KATEGORI</option>
                                        <option value="2">PAUD</option>
                                        <option value="3">SD</option>
                                        <option value="4">SMP</option>
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
