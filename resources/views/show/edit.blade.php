@extends('layouts.main')

@section('title', 'Modifier un spectacle')

@push('styles')
<style>
    .edit-show-form {
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        border: 1px solid #dedede;
        border-radius: 5px;
        background-color: #f8f9fa;
    }

    .edit-show-form h2 {
        text-align: center;
    }

    .edit-show-form .form-group {
        margin-bottom: 1rem;
    }

    .edit-show-form .form-control {
        margin-bottom: 0.5rem;
    }

    .edit-show-form .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 0.375rem 0.75rem;
        border-radius: 0.25rem;
    }

    .edit-show-form .btn-cancel {
        color: #6c757d;
        background-color: transparent;
        padding: 0.375rem 0.75rem;
        text-decoration: none;
        margin-left: 1rem;
    }

    .edit-show-form .alert-danger,
    .edit-show-form .error-list {
        margin-top: 1rem;
    }

    .error-list ul {
        padding-left: 1rem;
    }
</style>
@endpush

@section('content')
<div class="edit-show-form">
    <h1>Modifier le spectacle "{{$show->title}}"</h1>

    <form action="{{ route('show.update', $show->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?: $show->title }}" required>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="location_id">Lieu de création :</label>
            <select id="location_id" name="location_id" class="form-control @error('location_id') is-invalid @enderror" required>
                <option value="">Sélectionnez un lieu</option>
                @foreach($locations as $location)
                <option value="{{ $location->id }}" {{ old('location_id') == $location->id || $show->location_id == $location->id ? 'selected' : '' }}>
                    {{ $location->designation }}
                </option>
                @endforeach
            </select>
            @error('location_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') ?: $show->description }}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="bookable">Réservable :</label>
            <select id="bookable" name="bookable" class="form-control @error('bookable') is-invalid @enderror" required>
                <option value="1" {{ old('bookable') == '1' || $show->bookable == '1' ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ old('bookable') == '0' || $show->bookable == '0' ? 'selected' : '' }}>Non</option>
            </select>
            @error('bookable')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Prix :</label>
            <input type="number" step="0.01" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') ?: $show->price }}" required>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="{{ route('show.index') }}" class="btn btn-secondary btn-cancel">Annuler</a>
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
@endsection