@extends('dashboard')

@section('content')

<h1>Város létrehozása</h1>

<form action="{{ route('cities.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="city">Város neve:</label>
        <input id="city" name="city">
        <br>
        <label for="population">Város populációja:</label>
        <input id="population" name="population">
        <br>
        <label for="zip-code">Város irányítószáma:</label>
        <input id="zip-code" name="zip_code">
        <br>
        <label for="county">Város megyéje:</label>
        <select id="county" name="county_id">
            @foreach ($counties as $county)
            <option value="{{ $county->id }}">{{ $county->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Létrehozás</button>
        <br>
        <a href="{{ route('cities.index') }}">Mégse</a>
    </fieldset>
</form>

@endsection