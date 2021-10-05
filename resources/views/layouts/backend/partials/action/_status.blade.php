@if ($status == '1')
    <span class="btn btn-lg font-weight-bold btn-light-success btn-inline" data-id="{{ $id }}" data-status="{{ $status }}" data-name="{{ $name }}" id="ubahStatus" data-container="body" data-toggle="tooltip" title="Akun {{ $name }} aktif"><i class="fa fa-unlock"></i> Aktif</span>
@else
    <span class="btn btn-lg font-weight-bold btn-light-danger btn-inline" data-id="{{ $id }}" data-status="{{ $status }}" data-name="{{ $name }}" id="ubahStatus" data-container="body" data-toggle="tooltip" title="Akun {{ $name }} tidak aktif, tidak dapat di gunakan untuk login"><i class="fa fa-lock"></i> Tidak Aktif</span>
@endif
