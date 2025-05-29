@extends('layouts.app')

@section('head')
<style>
  .form-container {
    max-width: 600px;
    margin: 30px auto;
    padding: 25px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 12px rgba(0,0,0,0.1);
  }

  .form-container h2 {
    margin-bottom: 20px;
    color: #2c3e50;
  }

  .btn-primary {
    background-color: #3F7D58;
    border-color: #3F7D58;
  }
  .btn-primary:hover {
    background-color: #336843;
    border-color: #336843;
  }

  .btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
  }
  .btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
  }
</style>
@endsection

@section('content')
<div class="form-container">
  <h2>Tambah Pegawai</h2>

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('pegawais.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" id="nama" required value="{{ old('nama') }}">
    </div>

    <div class="mb-3">
      <label for="jabatan_id" class="form-label">Jabatan</label>
      <select name="jabatan_id" id="jabatan_id" class="form-select" required>
        <option value="">-- Pilih Jabatan --</option>
        @foreach($jabatans as $jabatan)
          <option value="{{ $jabatan->id }}" {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
            {{ $jabatan->nama }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="email" required value="{{ old('email') }}">
    </div>

    <button type="submit" class="btn btn-primary me-2">Simpan</button>
    <a href="{{ route('pegawais.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
