<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Mapa das Casas de Sementes')</title>

  <!-- OpenLayers e Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v9.0.0/ol.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS (mesmas classes, versão simples) -->
  <link rel="stylesheet" href="{{ asset('css/mapa.css') }}">
</head>
<body>
  <!-- ===== Topbar ===== -->
  <nav class="navbar navbar-expand-lg border-bottom sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold text-white" href="{{ route('mapa.index') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Escola" class="logo-escola">
      </a>

      <div class="d-flex gap-2">
        <a class="btn btn-light" href="{{ route('mapa.index') }}">Início</a>
        <a class="btn btn-outline-light" href="{{ route('mapa.create') }}">Cadastrar Novo Mapa</a>
      </div>
    </div>
  </nav>
  <!-- ===== /Topbar ===== -->

  <main class="container my-4">
    @yield('content')
  </main>

  <footer class="text-center my-5">
    <p class="mb-0">&copy; 2025 - Projeto Mapa das Sementes</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/ol@v9.0.0/dist/ol.js"></script>
  @stack('scripts')
</body>
</html>
