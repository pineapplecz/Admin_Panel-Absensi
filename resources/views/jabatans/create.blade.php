@extends('layouts.app')

@section('content')
<div class="form-container">
  <h2>Tambah Jabatan</h2>
  <form action="{{ route('jabatans.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Jabatan</label>
      <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama') }}">
    </div>
    <button type="submit" class="btn btn-primary me-2">Simpan</button>
    <a href="{{ route('jabatans.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
