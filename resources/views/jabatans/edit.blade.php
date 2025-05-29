@extends('layouts.app')

@section('content')
<div class="form-container">
  <h2>Edit Jabatan</h2>
  <form action="{{ route('jabatans.update', $jabatan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Jabatan</label>
      <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $jabatan->nama) }}">
    </div>
    <button type="submit" class="btn btn-primary me-2">Update</button>
    <a href="{{ route('jabatans.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
