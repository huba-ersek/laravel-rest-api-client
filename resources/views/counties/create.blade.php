@extends('dashboard')

@section('content')

<h1>Megye létrehozása</h1>

<form action="{{ route('counties.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Megye neve: </label>
        <input type="text" id="name" name="name">
        <br>
        <label for="arms">Megye címere: </label>
        <input type="text" id="arms" name="arms">
        <br>
        <button type="submit">Létrehozás</button>
        <br>
        <a href="{{ route('counties.index') }}">Mégse</a>
    </fieldset>
</form>

@endsection