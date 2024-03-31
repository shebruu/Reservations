@extends('layouts.main')

@section('title', 'Fiche d\'un spectacle')

@section('content')

<style>
    .page-container {
        margin: 40px;

    }

    h1 {
        font-size: 2em;
        color: #333;
    }

    h2 {
        font-size: 1.5em;
        color: #555;
        margin-top: 20px;
        /* Espace au-dessus des sous-titres */
    }

    ul {
        list-style-type: none;
        margin-top: 10px;
    }

    li {
        margin-bottom: 5px;
        /* Espace entre les éléments de liste */
    }

    .link-blue {
        color: blue;
        text-decoration: none;

    }

    .link-blue:hover {
        text-decoration: underline;
    }
</style>
<div class="page-container">
    <article>
        <h1>{{ $show->title }}</h1>

        @if($show->poster_url)
        <p><img src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}" width="200"></p>
        @else
        <canvas width="200" height="100" style="border:1px solid #000000;"></canvas>
        @endif

        @if($show->location)
        <p><strong>Lieu de création:</strong> {{ $show->location->designation }}</p>
        @endif
        <p>
            <strong>Description:</strong> {{ $show->description }}
        </p>

        <p><strong>Prix:</strong> {{ $show->price }} €</p>

        @if($show->bookable)
        <p><em>Réservable</em></p>
        @else
        <p><em>Non réservable</em></p>
        @endif

        <h2>Liste des représentations</h2>
        @if($show->representations->count()>=1)
        <ul>
            @foreach ($show->representations as $representation)
            <li>{{ $representation->when }}</li>
            @endforeach
        </ul>
        @else
        <p>Aucune représentation</p>
        @endif

        <h2>Liste des artistes</h2>
        <p><strong>Auteur:</strong>
            @foreach ($collaborateurs['auteur'] as $auteur)
            {{ $auteur->firstname }}
            {{ $auteur->lastname }}@if($loop->iteration == $loop->count-1) et
            @elseif(!$loop->last), @endif
            @endforeach
        </p>
        <p><strong>Metteur en scène:</strong>
            @foreach ($collaborateurs['scenographe'] as $scenographe)
            {{ $scenographe->firstname }}
            {{ $scenographe->lastname }}@if($loop->iteration == $loop->count-1) et
            @elseif(!$loop->last), @endif
            @endforeach
        </p>
        <p><strong>Distribution:</strong>
            @foreach ($collaborateurs['comédien'] as $comedien)
            {{ $comedien->firstname }}
            {{ $comedien->lastname }}@if($loop->iteration == $loop->count-1) et
            @elseif(!$loop->last), @endif
            @endforeach
        </p>

    </article>
    <nav><a href="{{ route('show.index') }}" class="link-blue">Retour à l'index</a></nav>
</div>
@endsection