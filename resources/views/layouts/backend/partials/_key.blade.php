<div class="modal fade bd-example-modal-lg" id="modal-key" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">
              <i class="fa fa-home text-dark"></i> PROFILE SEKOLAH
            </h4>
        </div>
        <div class="modal-body">
            <form id="form_validate" action="{{ route('m.sekolah.update', $school->id) }}" method="POST">
                @method('PUT')
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
                            <div class="alert alert-custom alert-outline-danger fade show mb-5" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                <div class="alert-text">Profle Sekolah Harus Di Lengkapi Sebelum Menjalankan SIMLAP</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>NAMA SEKOLAH: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('nama_sekolah') ? 'is-invalid' : ''}}" autocomplete="off" maxlength="255" required name="nama_sekolah" id="nama_sekolah" value="{{ old('nama_sekolah', $school->nama_sekolah) }}" placeholder="NAMA SEKOLAH..." />
                                    {!! $errors->first('nama_sekolah', '<label id="nama_sekolah-error" class="error invalid-feedback" for="nama_sekolah">:message</label>') !!}
                                </div>
                                <div class="col-lg-4">
                                    <label>NSS: </label>
                                    <input type="text" class="form-control {{ $errors->has('nss') ? 'is-invalid' : ''}}" name="nss" id="nss" placeholder="NSS..." value="{{ old('nss') }}"/>
                                    {!! $errors->first('nss', '<label id="nss-error" class="error invalid-feedback" for="nss">:message</label>') !!}
                                </div>
                                <div class="col-lg-4">
                                    <label>NPSN: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('npsn') ? 'is-invalid' : ''}}" autocomplete="on" name="npsn" id="npsn" required placeholder="NPSN..." value="{{ old('npsn', $school->npsn) }}"/>
                                    {!! $errors->first('npsn', '<label id="npsn-error" class="error invalid-feedback" for="npsn">:message</label>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4">
                                    <label>TAHUN BERDIRI: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control date_picker {{ $errors->has('tahun_berdiri') ? 'is-invalid' : ''}}" autocomplete="on" name="tahun_berdiri" id="tahun_berdiri" required placeholder="TAHUN BERDIRI..." value="{{ old('tahun_berdiri') }}"/>
                                    {!! $errors->first('tahun_berdiri', '<label id="tahun_berdiri-error" class="error invalid-feedback" for="tahun_berdiri">:message</label>') !!}
                                </div>
                                <div class="col-4">
                                    <label>AKREDITASI:</label>
                                    <select class="form-control selectform {{ $errors->has('akreditasi') ? 'is-invalid' : ''}}" id="akreditasi" name="akreditasi">
                                        <option value="">Belum Akreditasi</option>
                                        <option value="A" {{ old('akreditasi') == "A" ? "selected" : "" }}>A</option>
                                        <option value="B" {{ old('akreditasi') == "B" ? "selected" : "" }}>B</option>
                                        <option value="C" {{ old('akreditasi') == "C" ? "selected" : "" }}>C</option>
                                    </select>
                                    {!! $errors->first('akreditasi', '<label id="akreditasi-error" class="error invalid-feedback" for="akreditasi">:message</label>') !!}
                                </div>
                                <div class="col-4">
                                    <label>NILAI AKREDITASI: </label>
                                    <input type="number" class="form-control {{ $errors->has('nilai_akreditasi') ? 'is-invalid' : ''}}" autocomplete="on" name="nilai_akreditasi" id="nilai_akreditasi" value="{{ old('nilai_akreditasi') }}" required placeholder="NILAI AKREDITASI..." />
                                    {!! $errors->first('nilai_akreditasi', '<label id="nilai_akreditasi-error" class="error invalid-feedback" for="nilai_akreditasi">:message</label>') !!}
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
                                    <input type="text" class="form-control {{ $errors->has('alamat_sekolah') ? 'is-invalid' : ''}}" required name="alamat_sekolah" id="alamat_sekolah" value="{{ old('alamat_sekolah') }}" placeholder="ALAMAT SEKOLAH..."  />
                                    {!! $errors->first('alamat_sekolah', '<label id="alamat_sekolah-error" class="error invalid-feedback" for="alamat_sekolah">:message</label>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>TELEPON SEKOLAH: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('telepon_sekolah') ? 'is-invalid' : ''}}" required name="telepon_sekolah" id="telepon_sekolah" value="{{ old('telepon_sekolah') }}" placeholder="TELEPON SEKOLAH..."  />
                                    {!! $errors->first('telepon_sekolah', '<label id="telepon_sekolah-error" class="error invalid-feedback" for="telepon_sekolah">:message</label>') !!}
                                </div>
                                <div class="col-lg-4">
                                    <label>EMAIL SEKOLAH: <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" required name="email" id="email" value="{{ old('email') }}" placeholder="EMAIL SEKOLAH..."  />
                                    {!! $errors->first('email', '<label id="email-error" class="error invalid-feedback" for="email">:message</label>') !!}
                                </div>
                                <div class="col-lg-4">
                                    <label>KURIKULUM:<span class="text-danger">*</span></label>
                                    <select class="form-control selectform {{ $errors->has('kurikulum') ? 'is-invalid' : ''}}" id="kurikulum" name="kurikulum" required>
                                        <option value="">PILIH KURIKULUM</option>
                                        <option value="K13" {{ old('kurikulum') == "K13" ? "selected" : "" }}>K13</option>
                                        <option value="KTSP" {{ old('kurikulum') == "KTSP" ? "selected" : "" }}>KTSP</option>
                                    </select>
                                    {!! $errors->first('kurikulum', '<label id="kurikulum-error" class="error invalid-feedback" for="kurikulum">:message</label>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>KOORDINATOR:<span class="text-danger">*</span></label>
                                    <select class="form-control selectform koordinator {{ $errors->has('koordinator_id') ? 'is-invalid' : ''}}" id="koordinator_id" title="kolom koordinator di larang kosong" name="koordinator_id" required>
                                        <option value="">PILIH KOORDINATOR</option>
                                        @foreach ($koordinators as $k)
                                            <option value="{{ $k->id }}" {{ old('koordinator_id') == $k->id ? "selected" : "" }}>{{ $k->nama }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('koordinator_id', '<label id="koordinator_id-error" class="error invalid-feedback" for="koordinator_id">:message</label>') !!}
                                </div>
                                <div class="col-lg-4">
                                    <label>KEPALA SEKOLAH: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('kepala_sekolah') ? 'is-invalid' : ''}}" required name="kepala_sekolah" id="kepala_sekolah" value="{{ old('kepala_sekolah') }}" placeholder="KEPALA SEKOLAH..."  />
                                    {!! $errors->first('kepala_sekolah', '<label id="kepala_sekolah-error" class="error invalid-feedback" for="kepala_sekolah">:message</label>') !!}
                                </div>
                                <div class="col-lg-4">
                                    <label>NIP KEPALA SEKOLAH: </label>
                                    <input type="text" class="form-control {{ $errors->has('nip_kepala_sekolah') ? 'is-invalid' : ''}}" required name="nip_kepala_sekolah" id="nip_kepala_sekolah" value="{{ old('nip_kepala_sekolah') }}" placeholder="KEPALA SEKOLAH..."  />
                                    {!! $errors->first('nip_kepala_sekolah', '<label id="nip_kepala_sekolah-error" class="error invalid-feedback" for="nip_kepala_sekolah">:message</label>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4">
                                    <label>SERTIFIKASI: <span class="text-danger">*</span></label>
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" class="sudah" name="sertifikasi_kepala_sekolah" id="sertifikasi_kepala_sekolah" required {{ old('sertifikasi_kepala_sekolah') == "SUDAH" ? "checked" : "" }} value="SUDAH"/>
                                            <span></span>
                                            SUDAH
                                        </label>
                                        <label class="radio">
                                            <input type="radio" class="belum" name="sertifikasi_kepala_sekolah" {{ old('sertifikasi_kepala_sekolah') == "BELUM" ? "checked" : "" }} value="BELUM"/>
                                            <span></span>
                                            BELUM
                                        </label>
                                    </div>
                                    {!! $errors->first('sertifikasi_kepala_sekolah', '<label id="sertifikasi_kepala_sekolah-error" class="error invalid-feedback" for="sertifikasi_kepala_sekolah">:message</label>') !!}
                                </div>
                                <div class="col-4">
                                    <label>STATUS SEKOLAH: <span class="text-danger">*</span></label>
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" class="negeri" name="status_sekolah" id="status_sekolah" required value="NEGERI" {{ $school->status_sekolah == "NEGERI" ? "checked" : "" }}/>
                                            <span></span>
                                            NEGERI
                                        </label>
                                        <label class="radio">
                                            <input type="radio" class="swasta" name="status_sekolah" value="SWASTA" {{ $school->status_sekolah == "SWASTA" ? "checked" : "" }}/>
                                            <span></span>
                                            SWASTA
                                        </label>
                                    </div>
                                    {!! $errors->first('status_sekolah', '<label id="status_sekolah-error" class="error invalid-feedback" for="status_sekolah">:message</label>') !!}
                                </div>
                                <div class="col-4">
                                    <label>NO HANDPHONE KEPALA SEKOLAH: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('hp_kepala_sekolah') ? 'is-invalid' : ''}}" required name="hp_kepala_sekolah" id="hp_kepala_sekolah" value="{{ old('hp_kepala_sekolah') }}" placeholder="NO HANDPHONE SEKOLAH..."  />
                                    {!! $errors->first('hp_kepala_sekolah', '<label id="hp_kepala_sekolah-error" class="error invalid-feedback" for="hp_kepala_sekolah">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary font-weight-bold" id="submitData">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>