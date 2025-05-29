<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register | Giftopia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', sans-serif;
      background: url('https://img.freepik.com/free-vector/nature-scene-with-river-hills-forest-mountain-landscape-flat-cartoon-style-illustration_1150-37326.jpg') center/cover no-repeat;
    }

    .register-box {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 100%;
      max-width: 500px;
      background-color: rgba(255, 255, 255, 0.15);
      border-radius: 12px;
      padding: 30px;
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      color: #084135;
    }

    .register-box h2 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 24px;
      color: rgb(8, 103, 59);
      border-bottom: 2px solid #d1d1d1;
      padding-bottom: 12px;
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.5);
      border-radius: 8px;
      padding: 12px;
      color: #084135;
      margin-bottom: 20px;
      backdrop-filter: blur(4px);
    }

    .form-control:focus {
      border-color: #0d744e;
      background-color: rgba(255, 255, 255, 0.5);
      color: #084135;
      box-shadow: 0 0 6px rgba(13, 116, 78, 0.4);
    }

    .btn-main {
      background-color: rgba(13, 116, 78, 0.8);
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 8px;
      width: 100%;
      transition: background-color 0.3s ease;
    }

    .btn-main:hover {
      background-color: rgba(6, 108, 59, 0.9);
    }

    .text-link {
      display: block;
      text-align: right;
      font-size: 14px;
      margin-top: -12px;
      margin-bottom: 16px;
      color: rgb(8, 95, 72);
      text-decoration: none;
    }

    .text-link:hover {
      color: #0d744e;
    }

    .text-center-small {
      font-size: 14px;
      margin-top: 20px;
      text-align: center;
      border-top: 1px solid #ddd;
      padding-top: 16px;
    }
  </style>
</head>
<body>

<div class="register-box">
  <h2>Daftar Akun</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('register') }}">
    @csrf

    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus>

    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>

    <input type="password" name="password" class="form-control" placeholder="Password" required>

    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>

    <button type="submit" class="btn btn-main">Daftar</button>
  </form>

  <div class="text-center-small">
    Sudah punya akun? <a href="{{ route('login') }}" class="text-link">Masuk di sini</a>
  </div>
</div>

</body>
</html>
