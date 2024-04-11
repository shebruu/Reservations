@extends('layouts.main')

@section('title', 'Modifier un artiste')

@push('styles')
<style>
    .edit-artist-form {
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        border: 1px solid #dedede;
        border-radius: 5px;
        background-color: #f8f9fa;
    }

    .edit-artist-form h2 {
        text-align: center;
    }

    .edit-artist-form .form-group {
        margin-bottom: 1rem;
    }

    .edit-artist-form .form-control {
        margin-bottom: 0.5rem;
    }

    .edit-artist-form .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 0.375rem 0.75rem;
        border-radius: 0.25rem;
    }

    .edit-artist-form .btn-cancel {
        color: #6c757d;
        background-color: transparent;
        padding: 0.375rem 0.75rem;
        text-decoration: none;
        margin-left: 1rem;
        /* Ajoute un espace entre les boutons Modifier et Annuler */
    }

    .edit-artist-form .alert-danger,
    .edit-artist-form .error-list {
        margin-top: 1rem;
    }

    .error-list ul {
        padding-left: 1rem;
    }
</style>
@endpush

@section('content')
<div class="edit-artist-form">
    <h2>Modifier un artiste</h2>

    <form action="{{ route('artist.update', $artist->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="firstname">Prénom</label>
            <input type="text" id="firstname" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') ?: $artist->firstname }}" required>

            @error('firstname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="lastname">Nom</label>
            <input type="text" id="lastname" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') ?: $artist->lastname }}" required>

            @error('lastname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="{{ route('artist.index') }}" class="btn btn-secondary btn-cancel">Annuler</a>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger error-list">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<nav>
    <a href="{{ route('artist.index') }}" class="btn btn-link">Retour à l'index</a>
</nav>
@endsection