<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin | Appsensi</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Custom CSS --}}
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .navbar-brand {
            color: #3F7D58;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            color: #444;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #3F7D58;
        }

        .admin-title {
            font-size: 3rem;
            font-weight: 700;
            color: #3F7D58;
        }

        .admin-description {
            font-size: 1.2rem;
            color: #555;
            margin-top: 1rem;
            max-width: 480px;
        }

        .btn-admin {
            background-color: #3F7D58;
            color: #fff;
            padding: 0.75rem 1.5rem;
            margin-top: 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s ease;
            border: none;
        }

        .btn-admin:hover {
            background-color: #356b4c;
        }

        .admin-img {
            max-height: 650px;
            object-fit: contain;
        }

        .social-icons a {
            color: #3F7D58;
            font-size: 1.5rem;
            margin-right: 15px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #2d5d3e;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Appsensi.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a class="nav-link active fw-semibold" href="#">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Fitur</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Bantuan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6 order-2 order-md-1 text-center text-md-start">
                <h1 class="admin-title">Selamat Datang, Admin!</h1>
                <p class="admin-description">
                    Silakan login untuk mengakses dashboard dan mengelola data absensi, cuti, serta karyawan Anda secara efisien.
                </p>
                <a href="{{ route('login') }}" class="btn btn-admin">Login sebagai Admin</a>

                <div class="social-icons mt-4">
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-6 order-1 order-md-2 text-center mb-4 mb-md-0">
                <img src="{{ asset('https://static.vecteezy.com/system/resources/previews/004/261/154/original/office-discussion-people-illustration-free-vector.jpg') }}" alt="Ilustrasi Absensi" class="img-fluid rounded admin-img">
            </div>
        </div>
    </div>

    {{-- Bootstrap Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
