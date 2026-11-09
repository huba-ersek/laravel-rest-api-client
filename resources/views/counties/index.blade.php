@extends('dashboard')

@section('content')

<table>
    <tr>
        <th>#</th>
        <th>Név</th>
        <th>Címer</th>
    </tr>
    @foreach ($counties as $county)
    <tr>
        <td>{{ $county->id }}</td>
        <td>{{ $county->name }}</td>
        <td><img src="{{ $county->arms }}"></td>
    </tr>
    @endforeach
</table>

@endsection