<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>@yield('title','JurassiDraft')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand fw-semibold" href="{{ route('home') }}">JurassiDraft</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="navMain" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
          <li class="nav-item"><a class="nav-link" href="#caracteristicas">Características</a></li>
          <li class="nav-item"><a class="nav-link" href="#como-funciona">Cómo funciona</a></li>

          @auth
            @if(auth()->user()->rol === 'admin')
              <li class="nav-item">
                <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-primary btn-sm ms-lg-2">Panel Admin</a>
              </li>
            @else
              <li class="nav-item">
                <a href="{{ route('play') }}" class="btn btn-outline-primary btn-sm ms-lg-2">Jugar</a>
              </li>
            @endif
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST" class="ms-lg-2">
                @csrf
                <button class="btn btn-outline-danger btn-sm">Salir</button>
              </form>
            </li>
          @else
            <li class="nav-item">
              <a href="{{ route('login') }}" class="btn btn-primary btn-sm ms-lg-2">Ingresar</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-5">
    @yield('content')
  </main>

  <footer class="border-top bg-white">
    <div class="container py-4">
      <div class="row align-items-center">
        <div class="col">
          <span class="text-muted">© {{ date('Y') }} JurassiDraft</span>
        </div>
        <div class="col text-end">
          <a href="#caracteristicas" class="link-secondary small me-3">Características</a>
          <a href="#como-funciona" class="link-secondary small">Cómo funciona</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
