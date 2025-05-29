<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | Giftopia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    * {
      box-sizing: border-box;
    }

    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', sans-serif;
      background: url('https://img.freepik.com/free-vector/nature-scene-with-river-hills-forest-mountain-landscape-flat-cartoon-style-illustration_1150-37326.jpg') center/cover no-repeat;
      position: relative;
    }

    .login-box {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 100%;
      max-width: 460px;
      background-color: rgba(255, 255, 255, 0.15); /* transparan putih */
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      color: #084135; /* teks agak gelap supaya kontras */
    }

    .login-box h2 {
      color: #084135;
      text-align: center;
      margin-bottom: 24px;
      font-weight: bold;
      border-bottom: 2px solid rgba(255, 255, 255, 0.3);
      padding-bottom: 12px;
    }

    .form-control {
      padding: 12px;
      font-size: 16px;
      border-radius: 8px;
      margin-bottom: 20px;
      border: 1px solid rgba(255, 255, 255, 0.4);
      background-color: rgba(255, 255, 255, 0.25);
      color: #084135;
      backdrop-filter: blur(4px);
      -webkit-backdrop-filter: blur(4px);
      transition: border-color 0.3s ease;
    }

    .form-control:focus {
      border-color: #0d744e;
      background-color: rgba(255, 255, 255, 0.4);
      outline: none;
      box-shadow: 0 0 8px #0d744e;
      color: #084135;
    }

    .btn-main {
      background-color: rgba(13, 116, 78, 0.7);
      color: #fff;
      border: none;
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      margin-top: 8px;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
      box-shadow: 0 4px 15px rgba(13, 116, 78, 0.4);
      cursor: pointer;
    }

    .btn-main:hover {
      background-color: rgba(6, 108, 59, 0.85);
      box-shadow: 0 6px 20px rgba(6, 108, 59, 0.6);
    }

    .text-link {
      display: block;
      text-align: right;
      font-size: 14px;
      margin-top: -12px;
      margin-bottom: 16px;
      color: #084135;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .text-link:hover {
      color: #0d744e;
    }

    .text-center-small {
      font-size: 14px;
      margin-top: 20px;
      text-align: center;
      border-top: 1px solid rgba(255, 255, 255, 0.3);
      padding-top: 16px;
      color: #084135;
    }

    .social-login {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 16px;
    }

    .social-login a img {
      width: 36px;
      height: 36px;
      transition: transform 0.2s;
      filter: drop-shadow(0 0 1px rgba(0,0,0,0.2));
      border-radius: 6px;
    }

    .social-login a:hover img {
      transform: scale(1.1);
    }

    .btn-outline-dark {
      border-radius: 8px;
      background-color: rgba(255, 255, 255, 0.25);
      border: 1px solid rgba(255, 255, 255, 0.4);
      color: #084135;
      width: 100%;
      padding: 12px;
      transition: background-color 0.3s ease, border-color 0.3s ease;
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
      cursor: pointer;
    }

    .btn-outline-dark:hover {
      background-color: rgba(13, 116, 78, 0.7);
      border-color: rgba(13, 116, 78, 0.9);
      color: white;
      box-shadow: 0 4px 15px rgba(13, 116, 78, 0.6);
    }

  </style>
</head>
<body>

<div class="login-box">
  <h2>Login</h2>

  <!-- Contoh session dan error Laravel, bisa diubah sesuai kebutuhan -->
  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <input id="email" name="email" type="email" class="form-control" placeholder="Email atau Username" value="{{ old('email') }}" required autofocus>

    <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>

    <a href="{{ route('password.request') }}" class="text-link">Lupa Password?</a>

    <button type="submit" class="btn btn-main">Login</button>
  </form>

  <div class="text-center-small">Atau masuk dengan:</div>
  <div class="social-login">
    <a href="#"><img src="https://pluspng.com/img-png/google-logo-png-open-2000.png" alt="Google"></a>
    <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook"></a>
    <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple"></a>
  </div>

  <div class="text-center-small mt-3">Belum punya akun?</div>
  <a href="{{ route('register') }}">
    <button class="btn btn-outline-dark mt-2">Daftar</button>
  </a>
</div>

</body>
</html>
