@extends('dashboard')

@section('content')

<h1>Városok</h1>

<form action="" method="GET">
    <label for="name">Város neve: </label>
    <input type="text" id="name" name="name" value="{{ old('name', $name) }}">
    <br>
    <label for="county">Megye: </label>
    <select id="county" name="county_id">
        <option value=""></option>
        @foreach ($counties as $county)
        <option value="{{ $county->id }}" @selected(old('county_id', $countyId) == $county->id)>{{ $county->name }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Keresés</button>
</form>

<table class="content">
    <tr>
        <th class="content">#</th>
        <th class="content">Név</th>
        <th class="content">Populáció</th>
        <th class="content">Irányítószám</th>
        <th class="content">Megye</th>
        <th class="content"><a href="{{ route('cities.create') }}"><button>Hozzáad</button></a></th>
    </tr>
    @foreach ($cities as $city)
    <tr class="content-row">
        <td class="content">{{ $city->id }}</td>
        <td class="content">{{ $city->city }}</td>
        <td class="content">{{ $city->population }}</td>
        <td class="content">{{ $city->zip_code }}</td>
        <td class="content">{{ $city->county->name }}</td>
        <td class="content">
            <a href="{{ route('cities.edit', $city->id) }}"><button>Módosít</button></a>
            <form action="{{ route('cities.destroy', $city->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button class="delete-btn" type="submit" onclick="return confirm('Biztosan kívánja törölni?')">Törlés</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection