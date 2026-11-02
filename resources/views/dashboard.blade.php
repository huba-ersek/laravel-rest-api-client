<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <nav>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Kijelentkezés</button>
            </form>
            <ul class="navbar">
                <li><a href="{{ route('dashboard') }}">Főoldal</a></li>
            </ul>
        </nav>
    </header>
    <hr>
        @yield('content')
    <hr>
    <footer>
        © 2026 Érsek Huba
    </footer>
</body>
</html>