@extends('layouts.main')

@section('title', 'Liste des artistes')

@push('styles')

<style>
    .table-responsive {
        @apply rounded-lg;
        background-color: #fff;
        padding: 20px;
        @apply shadow;
    }

    .page-heading {
        margin: 20px 0;
        color: #333;
    }

    .btn-primary {
        @apply bg-blue-500 text-white;
    }

    .btn-danger {
        @apply bg-red-500 text-white;
    }

    /* Autres styles personnalisés */
</style>
@endpush

@section('content')
<div class="container mt-5">
    <h1 class="text-center page-heading">Liste des artistes</h1>
    <a href="{{ route('artist.create') }}" class="btn btn-success mb-3">Ajouter un nouvel artiste</a>
    <div class="table-responsive">
        <table class="table">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($artists as $artist)
                <tr>
                    <td>{{ $artist->firstname }}</td>
                    <td>{{ $artist->lastname }}</td>
                    <td>
                        <a href="{{ route('artist.show', $artist->id) }}" class="btn btn-secondary">Détail</a>

                        <a href="{{ route('artist.edit', $artist->id) }}" class="btn btn-primary btn-sm">Éditer</a>
                        <form action="{{ route('artist.destroy', $artist->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection