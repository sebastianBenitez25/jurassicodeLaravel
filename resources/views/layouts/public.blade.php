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

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('home') }}">
        <img src="{{ asset('images/logojuego_nobg.png') }}" alt="JurassiDraft Logo" height="40" class="me-2">
        JurassiDraft
      </a>

      <!-- Mobile Toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain"
        aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div id="navMain" class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav ms-auto flex-column flex-lg-row align-items-lg-center gap-2">
          @auth
            @if(auth()->user()->rol === 'admin')
              <li class="nav-item">
                <a href="{{ route('admin.usuarios.index') }}" class="btn btn-warning w-100 w-lg-auto px-3 mb-2 mb-lg-0">Panel Admin</a>
              </li>
            @else
              <li class="nav-item">
                <a href="{{ route('play') }}" class="btn btn-success w-100 w-lg-auto px-3 mb-2 mb-lg-0">Jugar</a>
              </li>
            @endif
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST" class="d-grid">
                @csrf
                <button class="btn btn-outline-danger w-100 w-lg-auto px-3">Salir</button>
              </form>
            </li>
          @else
            <li class="nav-item">
              <a href="{{ route('login') }}" class="btn btn-success w-100 w-lg-auto px-3 mb-2 mb-lg-0">Ingresar</a>
            </li>
            <li class="nav-item">
              <button class="btn btn-outline-secondary w-100 w-lg-auto px-3" disabled title="Función disponible próximamente">
                Registrarse
              </button>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  {{-- Contenido --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="border-top bg-white shadow-sm mt-5">
    <div class="container py-4">
      <div class="row align-items-center">
        {{-- Copyright --}}
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0 text-muted">
          © {{ date('Y') }}
          <strong class="text-dark">JurassiDraft</strong>
          <span class="text-secondary">— Derechos reservados.</span>
        </div>

        {{-- Links --}}
        <div class="col-md-6 text-center text-md-end">
          @auth
            <a href="{{ route('play') }}" class="text-decoration-none text-success me-3">Jugar</a>
          @endauth
          <a href="{{ url('documentacion') }}" class="text-decoration-none text-info-muted me-3">Documentación</a>
          <a href="mailto:jurassicodeisbo@gmail.com" class="text-decoration-none text-muted">Contacto</a>
        </div>
      </div>

      {{-- Frase final --}}
      <div class="text-center mt-3 small text-muted">
        Hecho con ❤️ por Seba, Nacho, Joaco y Tomi —
        <a href="https://jurassicode.vercel.app" target="_blank" class="link link-underline">
          JurassiCode
        </a>
      </div>
    </div>
  </footer>

  {{-- Scripts Bootstrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
