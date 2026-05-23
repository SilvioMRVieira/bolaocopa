<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolão Copa 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">Bolão Copa 2026</a>

            <div class="ms-auto d-flex align-items-center gap-3">
                @auth
                <span class="text-white-50">Olá, {{ auth()->user()->name }}</span>

                <!-- @if(auth()->user()->is_admin)
                <a href="{{ route('boloes.create') }}" class="btn btn-warning btn-sm">Criar bolão</a>
                @endif -->

                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Sair</button>
                </form>
                @endauth
            </div>
        </div>
    </nav>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

</body>

</html>