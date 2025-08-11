<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>JurassiDraft Admin - @yield('title') </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('admin.home') }}">
      <img src="{{ asset('images/logojuego_nobg.png') }}" alt="JurassiDraft Logo" height="40" class="me-2">
      JurassiDraft <small class="text-danger ms-1">Admin</small>
    </a>

    <div class="ms-auto d-flex gap-2">
      <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm">🏠 Volver al inicio</a>
      <form method="POST" action="{{ route('logout') }}" class="m-0">
        @csrf
        <button class="btn btn-outline-danger btn-sm">Salir</button>
      </form>
    </div>
  </div>
</nav>


  <div class="container py-4">
    @if (session('ok'))
    <div class="alert alert-success shadow-sm">{{ session('ok') }}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger shadow-sm">{{ session('error') }}</div>
    @endif

    @yield('content')
  </div>

  <footer class="border-top bg-white py-3 mt-4">
    <div class="container text-center text-muted small">
      © {{ date('Y') }} JurassiDraft - Panel de administración
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>