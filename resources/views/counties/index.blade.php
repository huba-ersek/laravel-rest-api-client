@extends('dashboard')

@section('content')

<table class="content">
    <tr>
        <th class="content">#</th>
        <th class="content">Név</th>
        <th class="content">Címer</th>
    </tr>
    @foreach ($counties as $county)
    <tr class="content-row">
        <td class="content"><b>{{ $county->id }}</b></td>
        <td class="content">{{ $county->name }}</td>
        <td class="content"><img class="county-arms" src="{{ $county->arms }}" alt="{{ $county->name }} megye címere"></td>
    </tr>
    @endforeach
</table>

@endsection