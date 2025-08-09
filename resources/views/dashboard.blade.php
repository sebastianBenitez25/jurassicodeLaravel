<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand" href="#">JurassiDraft</a>
      <div class="d-flex">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-outline-danger btn-sm">Salir</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container py-4">
    <div class="card">
      <div class="card-body">
        <h1 class="h5 mb-2">Hola, {{ auth()->user()->nombre }}</h1>
        <p class="text-muted mb-0">Rol: <span class="badge text-bg-secondary">{{ auth()->user()->rol }}</span></p>
      </div>
    </div>
  </div>
</body>
</html>
