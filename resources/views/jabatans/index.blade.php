<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Admin - Data Jabatan</title>
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
  />
  <link
    rel="stylesheet"
    href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css"
  />
  <link
    rel="stylesheet"
    href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0"
  />
  <style>
    /* Sama seperti style yang sudah ada */
    .main-sidebar {
      background-color: #3F7D58 !important;
    }
    .nav-sidebar .nav-link {
      color: white !important;
    }
    .nav-sidebar .nav-link.active,
    .nav-sidebar .nav-link:hover {
      background-color: #2f5d41 !important;
      color: #ffffff !important;
    }
    .content-wrapper {
      background-color: #f4f6f9;
    }
    .table-custom {
      background-color: white;
    }
    .table-custom th {
      background-color: #3F7D58;
      color: white;
    }
    .table-custom td {
      color: black;
    }
    .btn-tambah {
      background-color: #3F7D58;
      color: white;
    }
    .btn-edit {
      background-color: #ffc107;
      color: white;
    }
    .btn-hapus {
      background-color: #dc3545;
      color: white;
    }
    .user-panel {
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }
    .logout-btn {
      width: 100%;
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 10px;
      margin-top: 10px;
      border-radius: 5px;
      text-align: center;
      display: block;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"
            ><i class="fas fa-bars"></i
          ></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar elevation-4">
      <a href="#" class="brand-link">
        <span class="brand-text font-weight-light text-white">Appsensi</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
          <div class="image">
            <img
              src="https://blog-static.mamikos.com/wp-content/uploads/2023/07/7-Contoh-Foto-Close-Up-untuk-Melamar-Kerja-yang-Baik-dan-Benar_7-683x1024.jpg"
              class="img-circle elevation-2"
              alt="User Image"
            />
          </div>
          <div class="info">
            <a href="#" class="d-block text-white">Admin Setiana</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
          >
            <li class="nav-item">
              <a href="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/jabatans" class="nav-link active">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>Data Jabatan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pegawais" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Data Karyawan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/absensis" class="nav-link">
                <i class="nav-icon fas fa-calendar-check"></i>
                <p>Data Absensi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/cutis" class="nav-link">
                <i class="nav-icon fas fa-plane"></i>
                <p>Data Cuti</p>
              </a>
            </li>
          </ul>
          <form action="{{ route('logout') }}" method="POST" class="px-3">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
          </form>
        </nav>
      </div>
    </aside>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Jabatan</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="mb-3">
            <a href="{{ route('jabatans.create') }}" class="btn btn-tambah"
              >Tambah Jabatan</a
            >
          </div>

          <table class="table table-custom table-bordered">
            <thead>
              <tr>
                <th>Nama Jabatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($jabatans as $jabatan)
              <tr>
                <td>{{ $jabatan->nama }}</td>
                <td>
                  <a
                    href="{{ route('jabatans.edit', $jabatan->id) }}"
                    class="btn btn-edit btn-sm"
                    >Edit</a
                  >
                  <form
                    action="{{ route('jabatans.destroy', $jabatan->id) }}"
                    method="POST"
                    style="display: inline"
                    class="form-hapus"
                  >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-hapus btn-sm">
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
              @if($jabatans->isEmpty())
              <tr>
                <td colspan="2" class="text-center">Data Jabatan tidak ditemukan.</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      // Konfirmasi hapus pakai SweetAlert2
      document.querySelectorAll('.form-hapus').forEach(form => {
        form.addEventListener('submit', function(e) {
          e.preventDefault();

          Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data jabatan akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            }
          });
        });
      });

      // SweetAlert notifikasi sukses hapus jika ada session success
      @if(session('success'))
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: '{{ session('success') }}',
          timer: 2500,
          showConfirmButton: false
        });
      @endif
    </script>
  </div>
</body>

</html>
