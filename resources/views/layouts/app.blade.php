<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'FILKOM TemuIn')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('home') }}" class="brand">
            <img src="{{ asset('images/logo FILKOM TemuIn.PNG') }}" alt="Maskot FILKOM TemuIn">
            <span>FILKOM <b>TemuIn</b></span>
        </a>
        <div class="nav-links">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('catalog') }}">Katalog Barang</a>
            @auth
                @if(auth()->user()->role === 'security')
                    <a href="{{ url('/security/items') }}">Dashboard</a>
                @else
                    <a href="{{ url('/ob/laporan/buat') }}">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline btn-small">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-small">Masuk Petugas</a>
            @endauth
        </div>
    </nav>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>

    <footer class="footer">
        <b>FILKOM TemuIn</b> · Temukan barangmu kembali.<br>
        Fakultas Ilmu Komputer, Universitas Brawijaya © 2026
    </footer>
</body>
</html>