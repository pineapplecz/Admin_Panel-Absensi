@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Pegawai</div>

        <div class="card-body">
          <form action="{{ route('pegawais.update', $pegawai->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
              <label for="nama">Nama</label>
              <input id="nama" type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                value="{{ old('nama', $pegawai->nama) }}" required>
              @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="jabatan_id">Jabatan</label>
              <select id="jabatan_id" name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror" required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach($jabatans as $jabatan)
                  <option value="{{ $jabatan->id }}" {{ old('jabatan_id', $pegawai->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                    {{ $jabatan->nama }}
                  </option>
                @endforeach
              </select>
              @error('jabatan_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="email">Email</label>
              <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email', $pegawai->email) }}" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pegawais.index') }}" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
