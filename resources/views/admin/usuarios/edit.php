@extends('admin.layout')

@section('title','Editar usuario')

@section('content')
<div class="card">
  <div class="card-body">
    <h1 class="h5 mb-3">Editar usuario #{{ $usuario->id_usuario }}</h1>

    <form method="POST" action="{{ route('admin.usuarios.update', $usuario) }}">
      @csrf @method('PUT')

      <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre) }}" required>
        @error('nombre')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Usuario (login)</label>
        <input type="text" name="usuario" class="form-control" value="{{ old('usuario', $usuario->usuario) }}" required>
        @error('usuario')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Rol</label>
        <select name="rol" class="form-select" required>
          <option value="jugador" @selected(old('rol', $usuario->rol)==='jugador')>jugador</option>
          <option value="admin" @selected(old('rol', $usuario->rol)==='admin')>admin</option>
        </select>
        @error('rol')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Contraseña (dejar vacío para no cambiar)</label>
        <input type="password" name="contrasena" class="form-control">
        @error('contrasena')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>

      <div class="d-flex gap-2">
        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-secondary">Volver</a>
        <button class="btn btn-primary">Actualizar</button>
      </div>
    </form>
  </div>
</div>
@endsection
    