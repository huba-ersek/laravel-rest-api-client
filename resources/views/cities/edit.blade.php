@extends('dashboard')

@section('content')

<h1>Város módosítása</h1>

<form action="{{ route('cities.update', $city->id) }}" method="POST">
    @csrf
    @method("PUT")
    <fieldset>
        <label for="city">Város neve:</label>
        <input id="city" name="city" value="{{ old('city', $city->city) }}">
        <br>
        <label for="population">Város populációja:</label>
        <input id="population" name="population" value="{{ old('population', $city->population) }}">
        <br>
        <label for="zip-code">Város irányítószáma:</label>
        <input id="zip-code" name="zip_code" value="{{ old('zip_code', $city->zip_code) }}">
        <br>
        <label for="county">Város megyéje:</label>
        <select id="county" name="county_id">
            @foreach ($counties as $county)
            <option value="{{ $county->id }}" @selected(old('county_id', $city->county->id) == $county->id)>{{ $county->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Módosítás</button>
        <br>
        <a href="{{ route('cities.index') }}">Mégse</a>
    </fieldset>
</form>

@endsection