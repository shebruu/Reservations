@extends('layouts.main')

@section('title', 'Liste des artistes')

@push('styles')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
    .table-responsive {
        border-radius: 5px;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        /* Ombre légère pour le tableau */
    }

    .page-heading {
        margin: 20px 0;
        color: #333;
    }

    .btn-primary {
        background-color: #007bff;
    }

    .btn-danger {
        background-color: #dc3545;
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
            <thead class="thead-dark">
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
                        <a href="{{ route('artist.edit', $artist->id) }}" class="btn btn-primary btn-sm">Éditer</a>
                        <form action="{{ route('artist.destroy', $artist->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?');" class="d-inline">
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