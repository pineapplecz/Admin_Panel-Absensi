@extends('layouts.app')

@section('content')
<div class="form-container">
  <h2>Tambah Cuti</h2>
  <form action="{{ route('cutis.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="pegawai_id" class="form-label">Nama Pegawai</label>
      <select name="pegawai_id" id="pegawai_id" class="form-select" required>
        <option value="">-- Pilih Pegawai --</option>
        @foreach($pegawais as $pegawai)
          <option value="{{ $pegawai->id }}" {{ old('pegawai_id') == $pegawai->id ? 'selected' : '' }}>
            {{ $pegawai->nama }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
      <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required value="{{ old('tanggal_mulai') }}">
    </div>
    <div class="mb-3">
      <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
      <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required value="{{ old('tanggal_selesai') }}">
    </div>
    <div class="mb-3">
      <label for="alasan" class="form-label">Alasan</label>
      <textarea name="alasan" id="alasan" class="form-control" rows="3" required>{{ old('alasan') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary me-2">Simpan</button>
    <a href="{{ route('cutis.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
