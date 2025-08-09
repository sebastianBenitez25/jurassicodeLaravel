<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Iniciar sesión</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-md-6 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h1 class="h4 mb-4">Iniciar sesión</h1>

            @if ($errors->any())
              <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
              @csrf
              <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input id="usuario" name="usuario" type="text" value="{{ old('usuario') }}" required autofocus class="form-control">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input id="password" name="password" type="password" required class="form-control">
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="remember" name="remember" value="1">
                <label class="form-check-label" for="remember">Recordarme</label>
              </div>

              <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
