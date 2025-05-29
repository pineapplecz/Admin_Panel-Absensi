@extends('layouts.app')

@section('content')
<div class="form-container">
  <h2>Edit Absensi</h2>
  <form action="{{ route('absensis.update', $absensi->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="pegawai_id" class="form-label">Nama Pegawai</label>
      <select name="pegawai_id" id="pegawai_id" class="form-select" required>
        <option value="">-- Pilih Pegawai --</option>
        @foreach($pegawais as $pegawai)
          <option value="{{ $pegawai->id }}" {{ (old('pegawai_id', $absensi->pegawai_id) == $pegawai->id) ? 'selected' : '' }}>
            {{ $pegawai->nama }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" name="tanggal" id="tanggal" class="form-control" required value="{{ old('tanggal', $absensi->tanggal) }}">
    </div>
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select name="status" id="status" class="form-select" required>
        <option value="">-- Pilih Status --</option>
        <option value="Hadir" {{ (old('status', $absensi->status) == 'Hadir') ? 'selected' : '' }}>Hadir</option>
        <option value="Izin" {{ (old('status', $absensi->status) == 'Izin') ? 'selected' : '' }}>Izin</option>
        <option value="Sakit" {{ (old('status', $absensi->status) == 'Sakit') ? 'selected' : '' }}>Sakit</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary me-2">Update</button>
    <a href="{{ route('absensis.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
