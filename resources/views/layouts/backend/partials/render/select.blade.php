<option value="">PILIH {{ $title }}</option>
@foreach ($data as $d)
    <option value="{{ $d->id }}" {{ $d->id == $selected ? "selected" : "" }}>{{ $d->nama }}</option>
@endforeach