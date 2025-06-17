<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <meta charset="UTF-8">
    <title>@yield('title', 'MINISO Manager')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MINISO Manager</a>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <div class="container py-4">
        @yield('content')
    </div>

    {{-- Botón flotante y panel del asistente --}}
    @include('extras.asistente')

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')
</body>
</html>
