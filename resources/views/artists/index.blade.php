@extends('layouts.main')

@section('title', 'Liste des artistes')

@section('content')
<h1>Liste des artistes</h1>

<a href="{{ route('artists.create') }}">Ajouter un nouvel artiste</a>

<table>
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($artists as $artist)
        <tr>
            <td>{{ $artist->firstname }}</td>
            <td>{{ $artist->lastname }}</td>
            <td>
                <a href="{{ route('artists.edit', $artist->id) }}">Éditer</a>
                <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection