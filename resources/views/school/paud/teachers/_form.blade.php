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
                            <input type="hidden" value="{{ $district_id }}" id="id_district">
                            <div class="method-hidden"></div>
                            <input type="hidden" name="status" id="status_table">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Nama Lengkap: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" autocomplete="off" maxlength="255" required name="nama" id="nama_lengkap" placeholder="NAMA LENGKAP..." />
                                </div>
                                <div class="col-lg-4">
                                    <label>NIP:</label>
                                    <input type="text" class="form-control" autocomplete="on" name="nip" id="nip" placeholder="NIP..." />
                                </div>
                                <div class="col-lg-4">
                                    <label>JENIS KELAMIN: <span class="text-danger">*</span></label>
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" class="laki" name="jenis_kelamin" required value="L"/>
                                            <span></span>
                                            LAKI-LAKI
                                        </label>
                                        <label class="radio">
                                            <input type="radio" class="perempuan" id="jenis_kelamin" name="jenis_kelamin" value="P"/>
                                            <span></span>
                                            PEREMPUAN
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>TEMPAT LAHIR: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="tempat_lahir" id="tempat_lahir" placeholder="TEMPAT LAHIR..."  />
                                </div>
                                <div class="col-lg-4">
                                    <label>TANGGAL LAHIR: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control date_picker" required name="tanggal_lahir" id="tanggal_lahir" placeholder="TANGGAL LAHIR..."  />
                                </div>
                                <div class="col-lg-4">
                                    <label>STATUS PEGAWAI: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="status_pegawai" name="status_pegawai" required>
                                        <option value="">PILIH STATUS PEGAWAI</option>
                                        <option value="PNS">PNS</option>
                                        <option value="GBD">GBD</option>
                                        <option value="GTT">GTT</option>
                                        <option value="GTY">GTY</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label>PENDIDIKAN: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="pendidikan" name="pendidikan" required>
                                        <option value="">PILIH PENDIDIKAN</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label>JABATAN: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="jabatan" name="jabatan" required>
                                        <option value="">PILIH JABATAN</option>
                                        @foreach ($positions as $p)
                                            <option value="{{ $p->nama }}">{{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label>PANGKAT/GOL: </label>
                                    <select class="form-control selectform" id="golongan" name="golongan">
                                        <option value="">PILIH PANGKAT</option>
                                        @foreach ($ranks as $r)
                                            <option value="{{ $r->nama }}">{{ $r->nama }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="col-lg-4">
                                    <label>TUGAS MENGAJAR: <span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="tugas_mengajar" name="tugas_mengajar[]" multiple required>
                                        @foreach ($rooms as $s)
                                            <option value="{{ $s->kelas }}">{{ $s->kelas }}</option>
                                        @endforeach
                                    </select>
                                    <div class="error-tugas_mengajar"></div>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>TMT GOL TERAKHIR:</label>
                                    <input type="text" class="form-control date_picker" name="tmt_gol_terakhir" id="tmt_gol_terakhir" placeholder="TMT GOL TERAKHIR..."  />
                                </div>
                                <div class="col-lg-4">
                                    <label>PENGANGKATAN TMT CAPEG:</label>
                                    <input type="text" class="form-control date_picker" name="tmt_capeg" id="tmt_capeg" placeholder="TMT CAPEG..."  />
                                </div>
                                <div class="col-lg-4">
                                    <label>TANGGAL MULAI BEKERJA: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control date_picker" required name="tanggal_mulai_bekerja" id="tanggal_mulai_bekerja" placeholder="TANGGAL MULAI BEKERJA..."  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>KECAMATAN:<span class="text-danger">*</span></label>
                                    <select class="form-control selectform" id="district_id" title="kolom kecamatan di larang kosong" name="district_id" required>
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
                                    <label>ALAMAT RUMAH: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="alamat_rumah" id="alamat_rumah" placeholder="ALAMAT RUMAH..."  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>PELATIHAN:</label>
                                    <input type="text" class="form-control" name="pelatihan" id="pelatihan" placeholder="PELATIHAN..." />
                                </div>
                                <div class="col-lg-4">
                                    <label>SERTIFIKASI: <span class="text-danger">*</span></label>
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" class="sudah" name="sertifikasi" required value="1"/>
                                            <span></span>
                                            SUDAH
                                        </label>
                                        <label class="radio">
                                            <input type="radio" class="belum" name="sertifikasi" id="sertifikasi" value="0"/>
                                            <span></span>
                                            BELUM
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>TAHUN SERTIFIKASI:</label>
                                    <input type="text" class="form-control date_picker_year" name="sertifikasi_tahun" id="sertifikasi_tahun" placeholder="TAHUN SERTIFIKASI..."  />
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
