@extends('admin.layout')

@section('title','Usuarios')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h1 class="h4 mb-0">
    <i class="bi bi-people-fill me-2"></i> Gestión de usuarios
  </h1>
  <a href="{{ route('admin.usuarios.create') }}" class="btn btn-success shadow-sm">
    <i class="bi bi-person-plus-fill me-1"></i> Nuevo usuario
  </a>
</div>

<div class="card shadow-sm border-0">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
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
            <td class="fw-semibold">{{ $u->id_usuario }}</td>
            <td>{{ $u->nombre }}</td>
            <td>{{ $u->usuario }}</td>
            <td>
              @php
                $color = match($u->rol) {
                  'admin' => 'primary',
                  'jugador' => 'success',
                  default => 'secondary'
                };
              @endphp
              <span class="badge bg-{{ $color }} text-uppercase">{{ $u->rol }}</span>
            </td>
            <td>{{ \Carbon\Carbon::parse($u->creado_en)->format('Y-m-d H:i') }}</td>
            <td class="text-end">
              <a href="{{ route('admin.usuarios.edit', $u) }}" class="btn btn-sm btn-outline-primary me-1">
                <i class="bi bi-pencil-square"></i>
              </a>
              <button type="button"
                      class="btn btn-sm btn-outline-danger btn-delete"
                      data-action="{{ route('admin.usuarios.destroy', $u) }}"
                      data-username="{{ $u->usuario }}"
                      data-id="{{ $u->id_usuario }}"
                      data-role="{{ $u->rol }}"
                      data-created="{{ \Carbon\Carbon::parse($u->creado_en)->format('Y-m-d H:i') }}">
                <i class="bi bi-trash3-fill"></i>
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center text-muted py-4">
              <i class="bi bi-emoji-frown fs-4 d-block mb-2"></i>
              No hay usuarios registrados
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="card-body">
    {{ $usuarios->links() }}
  </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header border-0 text-white" style="background: linear-gradient(135deg,#dc3545,#6f1d1b);">
        <h5 class="modal-title">
          <i class="bi bi-exclamation-octagon-fill me-2"></i> Eliminar usuario
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Estás por borrar al usuario <strong id="del-username">—</strong> (ID <span id="del-id">—</span>)</p>
        <ul class="list-unstyled small text-muted mb-0">
          <li>Rol: <span id="del-role">—</span></li>
          <li>Creado: <span id="del-created">—</span></li>
        </ul>
        <div class="alert alert-danger mt-3 mb-0">
          Esta acción es irreversible.
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <form id="deleteForm" method="POST" class="ms-2">
          @csrf @method('DELETE')
          <button type="submit" class="btn btn-danger">Sí, eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

{{-- Bootstrap JS (si no está en el layout) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- Script modal --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
  const modalEl = document.getElementById('confirmDeleteModal');
  const modal = new bootstrap.Modal(modalEl);
  const deleteForm = document.getElementById('deleteForm');

  const delUsername = document.getElementById('del-username');
  const delId = document.getElementById('del-id');
  const delRole = document.getElementById('del-role');
  const delCreated = document.getElementById('del-created');

  document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', () => {
      deleteForm.action = btn.dataset.action;
      delUsername.textContent = btn.dataset.username;
      delId.textContent = btn.dataset.id;
      delRole.textContent = btn.dataset.role.toUpperCase();
      delCreated.textContent = btn.dataset.created;
      modal.show();
    });
  });
});
</script>
@endsection
