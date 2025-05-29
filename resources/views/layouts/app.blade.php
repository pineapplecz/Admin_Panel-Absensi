<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
</head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
