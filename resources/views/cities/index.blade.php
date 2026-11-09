@extends('dashboard')

@section('content')

<h1>Városok</h1>

<table class="content">
    <tr>
        <th class="content">#</th>
        <th class="content">Név</th>
        <th class="content">Populáció</th>
        <th class="content">Irányítószám</th>
        <th class="content">Megye</th>
    </tr>
    @foreach ($cities as $city)
    <tr class="content-row">
        <td class="content">{{ $city->id }}</td>
        <td class="content">{{ $city->city }}</td>
        <td class="content">{{ $city->population }}</td>
        <td class="content">{{ $city->zip_code }}</td>
        <td class="content">{{ $city->county->name }}</td>
    </tr>
    @endforeach
</table>

@endsection