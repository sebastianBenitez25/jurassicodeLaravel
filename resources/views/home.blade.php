@extends('layouts.public')

@section('title','JurassiDraft – Gestioná partidas de Draftosaurus')

@section('content')
  {{-- HERO --}}
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-12 col-lg-6">
          <h1 class="display-6 fw-bold mb-3">Gestioná partidas de <span class="text-primary">Draftosaurus</span> fácil y rápido</h1>
          <p class="lead text-muted mb-4">
            Crea partidas, administrá jugadores y anotá puntuaciones en un panel simple. Ideal para clases, torneos o juntadas.
          </p>

          @auth
            @if(auth()->user()->rol === 'admin')
              <a href="{{ route('admin.usuarios.index') }}" class="btn btn-primary btn-lg me-2">Ir al panel</a>
            @else
              <a href="{{ route('home') }}" class="btn btn-primary btn-lg me-2">Mi espacio</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button class="btn btn-outline-danger btn-lg">Salir</button>
            </form>
          @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Ingresar</a>
            
          @endauth
        </div>

        <div class="col-12 col-lg-6">
          <div class="card shadow-sm">
            <div class="ratio ratio-16x9">
              {{-- Placeholder de imagen/video;  --}}
              <img src="https://picsum.photos/800/450?random=3" class="card-img-top" alt="JurassiDraft preview">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- FEATURES --}}
  <section id="caracteristicas" class="py-5 bg-white border-top border-bottom">
    <div class="container">
      <div class="row mb-4">
        <div class="col">
          <h2 class="h3 mb-0">Características</h2>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-12 col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h3 class="h5">Usuarios y roles</h3>
              <p class="text-muted mb-0">Admin y jugador con acceso restringido por rol.</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h3 class="h5">Partidas</h3>
              <p class="text-muted mb-0">Creá y gestioná partidas con tus grupos.</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h3 class="h5">Puntuación</h3>
              <p class="text-muted mb-0">Anotá y compará puntuaciones por ronda.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- HOW IT WORKS --}}
  <section id="como-funciona" class="py-5">
    <div class="container">
      <div class="row mb-4">
        <div class="col">
          <h2 class="h3 mb-0">Cómo funciona</h2>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-12 col-md-4">
          <div class="card h-100">
            <div class="card-body">
              <span class="badge text-bg-primary mb-2">1</span>
              <h3 class="h5">Ingresá</h3>
              <p class="text-muted mb-0">Logueate con tu usuario y accedé a tu panel.</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="card h-100">
            <div class="card-body">
              <span class="badge text-bg-primary mb-2">2</span>
              <h3 class="h5">Creá una partida</h3>
              <p class="text-muted mb-0">Definí jugadores y reglas básicas.</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="card h-100">
            <div class="card-body">
              <span class="badge text-bg-primary mb-2">3</span>
              <h3 class="h5">Anotá puntos</h3>
              <p class="text-muted mb-0">Registrá movimientos y generá resultados.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
