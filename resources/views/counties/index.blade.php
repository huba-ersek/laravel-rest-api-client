@extends('dashboard')

@section('content')

<table class="content">
    <tr>
        <th class="content">#</th>
        <th class="content">Név</th>
        <th class="content">Címer</th>
        <th class="content"><a href="{{ route('counties.create') }}"><button>Hozzáad</button></a></th>
    </tr>
    @foreach ($counties as $county)
    <tr class="content-row">
        <td class="content"><b>{{ $county->id }}</b></td>
        <td class="content">{{ $county->name }}</td>
        <td class="content"><img class="county-arms" src="{{ $county->arms }}" alt="{{ $county->name }} megye címere"></td>
        <td class="content">
            <a href="{{ route('counties.edit', $county->id) }}"><button>Módosít</button></a>
            <form action="{{ route('counties.destroy', $county->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button class="delete-btn" onclick="return confirm('Biztosan kívánja törölni?')">Töröl</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection