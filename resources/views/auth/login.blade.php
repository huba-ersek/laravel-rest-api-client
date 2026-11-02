<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Login</title>
</head>
<body>
    <div id="login-div">
        <h2>Bejelentkezés</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if(session('error'))
                <div class="error">
                    {{ session('error') }}
                </div>
            @endif
            <label for="email">E-mail cím </label>
            <input id="email" name="email" type="email">
            <br>
            <label for="password">Jelszó </label>
            <input id="password" name="password" type="password">
            <br>
            <button type="submit">Bejelentkezés</button>
        </form>
    </div>
</body>
</html>