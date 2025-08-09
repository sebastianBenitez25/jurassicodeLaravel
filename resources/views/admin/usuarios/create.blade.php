@extends('admin.layout')

@section('title','Nuevo usuario')

@section('content')
<div class="card">
  <div class="card-body">
    <h1 class="h5 mb-3">Nuevo usuario</h1>

    <form method="POST" action="{{ route('admin.usuarios.store') }}">
      @csrf

      <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        @error('nombre')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Usuario (login)</label>
        <input type="text" name="usuario" class="form-control" value="{{ old('usuario') }}" required>
        @error('usuario')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Rol</label>
        <select name="rol" class="form-select" required>
          <option value="jugador" @selected(old('rol')==='jugador')>jugador</option>
          <option value="admin" @selected(old('rol')==='admin')>admin</option>
        </select>
        @error('rol')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="contrasena" class="form-control" required>
        @error('contrasena')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>

      <div class="d-flex gap-2">
        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        <button class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>
@endsection
