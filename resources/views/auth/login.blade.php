<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Iniciar sesión</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- Bootstrap Icons --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
  <div class="card p-4 shadow w-100" style="max-width: 400px">
    <form method="POST" action="{{ route('login.post') }}" novalidate>
      @csrf
      <h2 class="mb-4 text-center">Iniciar sesión</h2>

      @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
      @endif

      <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input
          type="text"
          class="form-control"
          id="usuario"
          name="usuario"
          placeholder="Tu usuario"
          required
          value="{{ old('usuario') }}"
          autofocus
        >
      </div>

      <div class="mb-3 position-relative">
        <label for="password" class="form-label">Contraseña</label>
        <div class="input-group">
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            placeholder="Contraseña"
            required
          >
          <button type="button" class="btn btn-outline-secondary" id="togglePassword" tabindex="-1">
            <i class="bi bi-eye"></i>
          </button>
        </div>
      </div>

      <div class="mb-3 text-center">
        <p class="mb-1">
          ¿No tenés cuenta? <a href="#">Registrate</a>
        </p>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-success">Iniciar Sesión</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('togglePassword').addEventListener('click', function () {
      const pwdInput = document.getElementById('password');
      const icon = this.querySelector('i');
      if (pwdInput.type === 'password') {
        pwdInput.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      } else {
        pwdInput.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      }
    });
  </script>
</body>
</html>
