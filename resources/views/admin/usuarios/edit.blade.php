@extends('admin.layout')

@section('title','Editar usuario')

@section('content')
<div class="card shadow-sm border-0">
  <div class="card-body">
    <h1 class="h5 mb-4">
      <i class="bi bi-pencil-square me-2 text-primary"></i>
      Editar usuario <span class="text-muted">#{{ $usuario->id_usuario }}</span>
    </h1>

    <form method="POST" action="{{ route('admin.usuarios.update', $usuario) }}">
      @csrf @method('PUT')

      {{-- Nombre --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Nombre</label>
        <input type="text" name="nombre" class="form-control" 
               value="{{ old('nombre', $usuario->nombre) }}" required>
        @error('nombre')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      {{-- Usuario --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Usuario (login)</label>
        <input type="text" name="usuario" class="form-control" 
               value="{{ old('usuario', $usuario->usuario) }}" required>
        @error('usuario')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      {{-- Rol --}}
      <div class="mb-3">
        <label class="form-label fw-semibold">Rol</label>
        <select name="rol" class="form-select" required>
          <option value="jugador" @selected(old('rol', $usuario->rol)==='jugador')>Jugador</option>
          <option value="admin" @selected(old('rol', $usuario->rol)==='admin')>Admin</option>
        </select>
        @error('rol')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      {{-- Contraseña --}}
      <div class="mb-3 position-relative">
        <label class="form-label fw-semibold">
          Contraseña 
          <small class="text-muted">(dejar vacío para no cambiar)</small>
        </label>
        <div class="input-group">
          <input type="password" name="contrasena" id="contrasena" class="form-control">
          <button type="button" class="btn btn-outline-secondary toggle-pass" data-target="contrasena">
            <i class="bi bi-eye"></i>
          </button>
        </div>
        @error('contrasena')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      {{-- Repetir Contraseña --}}
      <div class="mb-4 position-relative">
        <label class="form-label fw-semibold">
          Repetir contraseña
          <small class="text-muted">(si ingresaste una nueva)</small>
        </label>
        <div class="input-group">
          <input type="password" name="contrasena_confirmation" id="contrasena_confirmation" class="form-control">
          <button type="button" class="btn btn-outline-secondary toggle-pass" data-target="contrasena_confirmation">
            <i class="bi bi-eye"></i>
          </button>
        </div>
        @error('contrasena_confirmation')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      {{-- Botones --}}
      <div class="d-flex gap-2">
        <a href="{{ route('admin.usuarios.index') }}" 
           class="btn btn-outline-secondary">
          <i class="bi bi-arrow-left-circle me-1"></i> Volver
        </a>
        <button class="btn btn-primary">
          <i class="bi bi-save me-1"></i> Actualizar
        </button>
      </div>
    </form>
  </div>
</div>

{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

{{-- Script para mostrar/ocultar contraseñas --}}
<script>
  document.querySelectorAll('.toggle-pass').forEach(btn => {
    btn.addEventListener('click', () => {
      const input = document.getElementById(btn.dataset.target);
      const icon = btn.querySelector('i');
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
      }
    });
  });
</script>
@endsection
