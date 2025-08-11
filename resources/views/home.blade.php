@extends('layouts.public')

@section('title','JurassiDraft – Inicio')

@section('content')
{{-- HERO --}}
<section class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center g-4">

      {{-- Columna de texto y acciones --}}
      <div class="col-12 col-lg-6">
        <h1 class="display-5 fw-bold mb-3">
          ¡Bienvenido a <span class="text-success">JurassiDraft</span>!
        </h1>
        <p class="lead text-body-secondary mb-4">
          Gestioná partidas de <strong>Draftosaurus</strong>: creá salas, administrá jugadores y llevá el puntaje sin papelitos.
          Ideal para clases, torneos o juntadas con amigos.
        </p>

        @auth
          {{-- Botones de acciones --}}
          <div class="d-flex flex-wrap align-items-center gap-2">
            @if(auth()->user()->rol === 'admin')
              <a href="{{ route('admin.usuarios.index') }}" class="btn btn-success btn-lg">Ir al panel</a>
            @endif
            <a href="{{ route('play') }}" class="btn btn-success btn-lg">Jugar</a>

            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button class="btn btn-danger btn-lg">Cerrar sesión</button>
            </form>
          </div>

          {{-- Saludo integrado como chip --}}
          <div class="mt-3">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-2 bg-success-subtle rounded-pill shadow-sm">
              <span class="badge text-bg-primary">👋</span>
              <span class="text-success fw-semibold">
                ¡Hola, {{ auth()->user()->nombre ?? auth()->user()->usuario }}!
              </span>
            </div>
          </div>
        @endauth

        @guest
          {{-- Botones para invitados --}}
          <div class="d-flex flex-wrap align-items-center gap-2">
            <a href="{{ route('login') }}" class="btn btn-success btn-lg">Iniciar sesión</a>
            <button class="btn btn-outline-secondary btn-lg" disabled title="Función disponible próximamente">
              Registrarse
            </button>
          </div>
        @endguest
      </div>

      {{-- Columna de imagen --}}
      <div class="col-12 col-lg-6">
        <div class="card border-0 shadow-lg overflow-hidden rounded-4">
          <div class="ratio ratio-16x9 bg-success-subtle">
            <img src="{{ asset('images/logojuego_nobg.png') }}"
                 class="img-fluid w-100 h-100 p-4"
                 alt="Vista previa de JurassiDraft"
                 style="object-fit: contain;">
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


{{-- CÓMO FUNCIONA --}}
<section class="py-5 bg-light border-top">
  <div class="container">
    <div class="row mb-4 text-center">
      <div class="col">
        <h2 class="h3 mb-1">¿Cómo funciona?</h2>
        <p class="text-body-secondary mb-0">Cuatro pasos y ya estás jugando.</p>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-12 col-md-6">
        <div class="card h-100 d-flex flex-row align-items-start p-3 border-0 shadow-sm">
          <img src="{{ asset('images/logojuego_nobg.png') }}" alt="Draft" class="me-3 rounded" style="width:80px;height:80px;object-fit:cover;">
          <div>
            <h5 class="card-title mb-1">1) Elegí tus dinosaurios</h5>
            <p class="card-text text-body-secondary mb-0">
              Tomá dinos al azar, mantenelos en secreto y seleccioná uno por turno. El draft define tu estrategia.
            </p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="card h-100 d-flex flex-row align-items-start p-3 border-0 shadow-sm">
          <img src="{{ asset('images/logojuego_nobg.png') }}" alt="Dado" class="me-3 rounded" style="width:80px;height:80px;object-fit:cover;">
          <div>
            <h5 class="card-title mb-1">2) Restricción del dado</h5>
            <p class="card-text text-body-secondary mb-0">
              En cada turno, el dado impone una regla de colocación. Adaptate y maximizá tus opciones.
            </p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="card h-100 d-flex flex-row align-items-start p-3 border-0 shadow-sm">
          <img src="{{ asset('images/logojuego_nobg.png') }}" alt="Parque" class="me-3 rounded" style="width:80px;height:80px;object-fit:cover;">
          <div>
            <h5 class="card-title mb-1">3) Colocá los dinosaurios</h5>
            <p class="card-text text-body-secondary mb-0">
              Cada recinto puntúa distinto. Pensá dónde poner cada especie para sumar al máximo.
            </p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="card h-100 d-flex flex-row align-items-start p-3 border-0 shadow-sm">
          <img src="{{ asset('images/logojuego_nobg.png') }}" alt="Puntaje" class="me-3 rounded" style="width:80px;height:80px;object-fit:cover;">
          <div>
            <h5 class="card-title mb-1">4) Sumá puntos y ganá</h5>
            <p class="card-text text-body-secondary mb-0">
              Tras dos rondas, el sistema calcula puntajes por recinto, parejas, T-Rex y río. El mejor parque gana.
            </p>
          </div>
        </div>
      </div>
    </div>

    @guest
    <div class="text-center mt-4">
      <button class="btn btn-success btn-lg" disabled title="Función disponible próximamente">
        Crear cuenta y empezar
      </button>
    </div>
    @endguest
  </div>
</section>

{{-- CARACTERÍSTICAS --}}
<section class="py-5 bg-white border-top">
  <div class="container">
    <div class="row mb-4">
      <div class="col">
        <h2 class="h3 mb-1">Características</h2>
        <p class="text-body-secondary mb-0">Todo lo que necesitás para una partida prolija.</p>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-12 col-md-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="mb-2 d-inline-flex align-items-center justify-content-center rounded-3 bg-success-subtle text-success px-2 py-1">🔐</div>
            <h3 class="h5 mb-1">Usuarios y roles</h3>
            <p class="text-body-secondary mb-0">Admin y jugador con permisos acotados por rol.</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="mb-2 d-inline-flex align-items-center justify-content-center rounded-3 bg-success-subtle text-success px-2 py-1">🧩</div>
            <h3 class="h5 mb-1">Partidas</h3>
            <p class="text-body-secondary mb-0">Creá, configurá y relanzá partidas con tu grupo.</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="mb-2 d-inline-flex align-items-center justify-content-center rounded-3 bg-success-subtle text-success px-2 py-1">📈</div>
            <h3 class="h5 mb-1">Puntuación</h3>
            <p class="text-body-secondary mb-0">Anotá, validá y compará puntajes por ronda.</p>
          </div>
        </div>
      </div>
    </div>

    @auth
    <div class="text-center mt-4">
      <a href="{{ route('play') }}" class="btn btn-success btn-lg">Crear nueva partida</a>
    </div>
    @endauth
  </div>
</section>

{{-- QUIÉNES SOMOS --}}
<section id="quienes-somos" class="py-5 bg-light border-top">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-md-6">
        <h2 class="h3 mb-3">¿Quiénes somos?</h2>
        <p>
          <strong>JurassiDraft</strong> es una solución de <strong>JurassiCode</strong>, un equipo de estudiantes
          apasionados por el desarrollo web y los juegos de mesa. Digitalizamos la experiencia para hacerla más
          fluida, organizada y divertida.
        </p>
        <ul class="list-unstyled mb-0">
          <li class="mb-1"><strong>Misión:</strong> Simplificar la gestión de puntos y turnos.</li>
          <li class="mb-1"><strong>Visión:</strong> Ser la plataforma de referencia para partidas asistidas.</li>
          <li class="mb-1"><strong>Valores:</strong> Innovación, claridad, accesibilidad y diversión.</li>
        </ul>
      </div>
      <div class="col-md-6 text-center">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden d-inline-block">
          <div class="bg-success-subtle p-4">
            <img src="https://jurassicode.vercel.app/images/logo.png"
              alt="Equipo JurassiCode"
              class="img-fluid"
              style="max-height: 240px; object-fit: contain;">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- TESTIMONIOS --}}
<section class="py-5 bg-white border-top">
  <div class="container">
    <h2 class="h3 text-center mb-4">Lo que dicen quienes lo probaron</h2>

    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner text-center">
        @php
        $testimonios = [
        ['autor' => 'Joaco', 'texto' => '¡Nunca fue tan fácil llevar la cuenta en Draftosaurus! Nos enfocamos en jugar.'],
        ['autor' => 'Seba', 'texto' => 'Ideal para familia. Los chicos anotan y los grandes se olvidan del papel.'],
        ['autor' => 'Tomi', 'texto' => 'Menos discusiones, cero errores de cuenta. La interfaz es clarísima.'],
        ['autor' => 'Nacho', 'texto' => 'En segundos ya estás jugando. Nada técnico, todo intuitivo.'],
        ['autor' => 'Marcelo', 'texto' => 'Funciona en el celu. En la playa llevamos el puntaje sin drama.'],
        ['autor' => 'Walter', 'texto' => 'Lo usamos en un torneo. Rápido de entender y confiable.'],
        ];
        @endphp

        @foreach ($testimonios as $i => $t)
        <div class="carousel-item @if($i===0) active @endif">
          <blockquote class="blockquote">
            <p class="mb-4">“{{ $t['texto'] }}”</p>
            <footer class="blockquote-footer">{{ $t['autor'] }}</footer>
          </blockquote>
        </div>
        @endforeach
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  const carouselEl = document.getElementById('testimonialCarousel');
  if (carouselEl) {
    const carousel = new bootstrap.Carousel(carouselEl, {
      interval: 4000,
      ride: 'carousel',
      pause: false,
      wrap: true
    });
  }
</script>
@endpush