@extends('layouts.main')

@section('title', 'Fiche d\'un artiste')

@push('styles')
<style>
    .artist-header {
        background-color: #f7f7f7;
        border-bottom: 1px solid #eaeaea;
        padding: 1rem;
        margin-bottom: 2rem;
    }

    .artist-name {
        font-size: 2rem;
        font-weight: 700;
        color: #333;
        margin-bottom: .5rem;
    }

    .types-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #555;
        margin-bottom: 1rem;
    }

    .types-list {
        list-style-type: none;
        padding: 0;
    }

    .types-list li {
        background-color: #f9f9f9;
        padding: .5rem 1rem;
        border: 1px solid #ddd;
        margin-bottom: .5rem;
        border-radius: .25rem;
    }

    .buttons-container {
        display: flex;
        justify-content: space-between;
        margin-top: 2rem;
    }

    .btn-custom {
        padding: .6rem 1.2rem;
        font-size: 1rem;
        border-radius: .25rem;
        color: #fff;
        text-align: center;
        text-decoration: none;
    }

    .btn-edit {
        background-color: #007bff;
    }

    .btn-back {
        background-color: #6c757d;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="artist-header text-center">
        <div class="artist-name">{{ $artist->firstname }} {{ $artist->lastname }}</div>
    </div>

    <div class="types-section">
        <div class="types-title">Types associés</div>
        <ul class="types-list">
            @foreach($artist->types as $type)
            <li>{{ $type->type }}</li>
            @endforeach
        </ul>
    </div>

    <div class="buttons-container">
        <a href="{{ route('artist.edit', $artist->id) }}" class="btn-custom btn-edit">Modifier</a>
        <a href="{{ route('artist.index') }}" class="btn-custom btn-back">Retour à la liste des artistes</a>
    </div>
</div>
@endsection