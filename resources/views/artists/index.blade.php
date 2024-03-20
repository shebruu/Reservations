@extends('layouts.main')

@section('title', 'Liste des artistes')

@section('content')
<h1>Liste des artistes</h1>

<a href="{{ route('artist.create') }}">Ajouter un nouvel artiste</a>
{{-- Point d'ancrage pour le composant React --}}

<div id="app"></div>


{{-- Transférer les données des artistes à React --}}
<script>
    window.artists = @json($artists);
</script>
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
                <a href="{{ route('artist.edit', $artist->id) }}">Éditer</a>
                <form action="{{ route('artist.destroy', $artist->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?');">
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