<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Admin')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand" href="{{ route('admin.home') }}">JurassiDraft Admin</a>
      <div class="ms-auto">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-outline-danger btn-sm">Salir</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container py-4">
    @if (session('ok'))
      <div class="alert alert-success">{{ session('ok') }}</div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
