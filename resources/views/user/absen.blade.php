@extends('layouts.app')

@section('content')

@push('styles')
<style>
  /* Reset & base */
  body {
    background: #f8fafc;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #2e3a2e;
  }

  /* Container utama */
  .main-container {
    max-width: 800px;
    margin: 3rem auto 5rem;
    padding: 0 1rem;
  }

  /* Card style */
  .card {
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(50, 115, 75, 0.15);
    background: #ffffff;
    overflow: hidden;
  }

  .card-header {
    background: linear-gradient(90deg, #3f7d58, #276741);
    color: #fff;
    font-weight: 700;
    font-size: 1.5rem;
    padding: 1.25rem 2rem;
    text-align: center;
  }

  .card-body {
    padding: 2rem;
  }

  /* Button */
  .btn-success {
    background-color: #3f7d58;
    border: none;
    font-weight: 600;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    width: 100%;
    box-shadow: 0 6px 12px rgba(63, 125, 88, 0.35);
    transition: background-color 0.3s ease;
  }

  .btn-success:hover,
  .btn-success:focus {
    background-color: #2e5c3f;
    box-shadow: 0 8px 18px rgba(46, 92, 63, 0.5);
  }

  /* Select */
  .form-select {
    border-radius: 12px;
    border: 2px solid #3f7d58;
    padding: 0.65rem 1rem;
    font-weight: 600;
    color: #2c3e21;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    box-shadow: none;
  }

  .form-select:focus {
    border-color: #276741;
    box-shadow: 0 0 8px rgba(39, 103, 65, 0.4);
  }

  /* Alerts */
  .alert-success, .alert-info {
    padding: 1rem 1.5rem;
    border-radius: 12px;
    font-weight: 600;
    margin-bottom: 1.5rem;
    box-shadow: 0 3px 10px rgba(39, 103, 65, 0.1);
  }

  .alert-success {
    background-color: #d8f0e4;
    color: #276741;
  }

  .alert-info {
    background-color: #d0f0db;
    color: #2f5d41;
  }

  /* Badge status */
  .badge-status {
    background: linear-gradient(45deg, #276741, #3f7d58);
    font-size: 1.1rem;
    padding: 0.5em 1.1em;
    border-radius: 20px;
    font-weight: 700;
    color: white;
    margin-left: 0.7rem;
    text-transform: capitalize;
  }

  /* Navbar */
  nav.navbar {
    background: #fff;
    box-shadow: 0 2px 6px rgba(63, 125, 88, 0.15);
    margin-bottom: 2rem;
  }

  nav .navbar-brand {
    font-weight: 700;
    font-size: 1.5rem;
    color: #3f7d58 !important;
  }

  /* Sidebar nav */
  .sidebar-nav {
    max-width: 200px;
  }

  .sidebar-nav .nav-link {
    font-weight: 600;
    color: #3f7d58;
    padding: 0.75rem 1rem;
    border-radius: 12px;
    margin-bottom: 0.5rem;
    transition: background-color 0.25s ease, color 0.25s ease;
  }

  .sidebar-nav .nav-link:hover,
  .sidebar-nav .nav-link.active {
    background: #3f7d58;
    color: white;
  }

  /* Responsive */
  @media (max-width: 767.98px) {
    .main-container {
      margin: 2rem 1rem 4rem;
    }
    .sidebar-nav {
      max-width: 100%;
      margin-bottom: 1.5rem;
    }
  }
</style>
@endpush

<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">Sistem Absensi</a>

    <div class="dropdown ms-auto">
      <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->name }}
      </button>
      <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button class="dropdown-item" type="submit">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="main-container d-flex flex-column flex-md-row gap-4">

  <nav class="sidebar-nav d-flex flex-column flex-shrink-0">
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <i class="bi bi-house-door-fill me-2"></i> Dashboard
    </a>
    <a href="{{ route('absensi.index') }}" class="nav-link {{ request()->routeIs('absensi.*') ? 'active' : '' }}">
      <i class="bi bi-clock-history me-2"></i> Riwayat Absensi
    </a>
  </nav>

  <main class="flex-grow-1">
    <div class="card">
      <div class="card-header">
        Halo {{ Auth::user()->name }}, Silakan Absen
      </div>
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        @if ($absensiHariIni)
          <div class="alert alert-info d-flex align-items-center">
            Kamu sudah absen hari ini dengan status: 
            <span class="badge-status">{{ $absensiHariIni->status }}</span>
          </div>
        @else
          <form method="POST" action="{{ route('absen.store') }}">
            @csrf
            <div class="mb-4">
              <label for="status" class="form-label fw-semibold">Status Kehadiran</label>
              <select name="status" id="status" class="form-select" required>
                <option value="" selected disabled>-- Pilih Status --</option>
                <option value="hadir">Hadir</option>
                <option value="alpha">Alpha</option>
                <option value="sakit">Sakit</option>
                <option value="izin">Izin</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Absen Sekarang</button>
          </form>
        @endif
      </div>
    </div>
  </main>

</div>

@endsection
