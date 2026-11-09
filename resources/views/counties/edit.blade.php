@extends('dashboard')

@section('content')

<h1>Megye módosítása</h1>

<form action="{{ route('counties.update', $county->id) }}" method="POST">
    @csrf
    @method("PUT")
    <fieldset>
        <label for="name">Megye neve: </label>
        <input type="text" id="name" name="name" value="{{ old('name', $county->name) }}">
        <br>
        <label for="arms">Megye címere: </label>
        <input type="text" id="arms" name="arms" value="{{ old('arms', $county->arms) }}">
        <br>
        <button type="submit">Módosítás</button>
        <br>
        <a href="{{ route('counties.index') }}">Mégse</a>
    </fieldset>
</form>

@endsection