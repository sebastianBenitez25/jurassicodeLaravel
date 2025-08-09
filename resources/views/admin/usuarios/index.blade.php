@extends('admin.layout')

@section('title','Usuarios')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 mb-0">Usuarios</h1>
  <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary">Nuevo usuario</a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-striped align-middle mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Usuario</th>
          <th>Rol</th>
          <th>Creado</th>
          <th class="text-end">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($usuarios as $u)
          <tr>
            <td>{{ $u->id_usuario }}</td>
            <td>{{ $u->nombre }}</td>
            <td>{{ $u->usuario }}</td>
            <td><span class="badge text-bg-secondary">{{ $u->rol }}</span></td>
            <td>{{ \Carbon\Carbon::parse($u->creado_en)->format('Y-m-d H:i') }}</td>
            <td class="text-end">
              <a href="{{ route('admin.usuarios.edit', $u) }}" class="btn btn-sm btn-outline-primary">Editar</a>
              <form action="{{ route('admin.usuarios.destroy', $u) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('¿Eliminar usuario #{{ $u->id_usuario }}?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center text-muted py-4">Sin usuarios</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="card-body">
    {{ $usuarios->links() }}
  </div>
</div>
@endsection
