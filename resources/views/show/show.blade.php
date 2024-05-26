@extends('layouts.main')

@section('title', 'Fiche d\'un spectacle')

@section('content')

<style>
    .show-detail-img {
        height: 500px;
        width: 100%;
        object-fit: cover;
    }

    .show-title {
        font-size: 2.5em;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 2em;
        margin-top: 40px;
        margin-bottom: 20px;
    }

    .card-text {
        font-size: 1.2em;
        line-height: 1.5;
    }

    .list-group-item {
        font-size: 1.1em;
    }

    .section {
        margin-bottom: 30px;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                @if($show->poster_url)
                <img src="{{ asset('images/'.$show->poster_url) }}" class="card-img-top show-detail-img" alt="{{ $show->title }}">
                @endif

                <div class="card-body">
                    <h1 class="card-title show-title">{{ $show->title }}</h1>

                    @if($show->location)
                    <p class="card-text"><strong>Lieu de création:</strong> {{ $show->location->designation }}</p>
                    @endif

                    <p class="card-text"><strong>Description:</strong> {{ $show->description }}</p>

                    <p class="card-text"><strong>Prix:</strong> {{ $show->price }} €
                        @if($show->bookable)
                        <span class="badge bg-success">Réservable</span>
                        @else
                        <span class="badge bg-secondary">Non réservable</span>
                        @endif
                    </p>

                    <div class="section">
                        <h2 class="section-title">Liste des représentations</h2>
                        @if($show->representations->count() >= 1)
                        <ul class="list-group list-group-flush">
                            @foreach ($show->representations as $representation)
                            <li class="list-group-item">
                                {{ $representation->when }} - {{ $representation->location->designation }}
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <p class="card-text">Aucune représentation</p>
                        @endif
                    </div>

                    <div class="section">
                        <h2 class="section-title">Liste des artistes</h2>
                        @foreach ($collaborateurs as $type => $artistes)
                        <p class="card-text"><strong>{{ $type }}:</strong>
                            @foreach ($artistes as $artiste)
                            {{ $artiste->firstname }} {{ $artiste->lastname }}@if (!$loop->last), @endif
                            @endforeach
                        </p>
                        @endforeach
                    </div>

                    <div class="section">
                        <h2 class="section-title">Metteurs en scène</h2>
                        @if(isset($collaborateurs['Metteur en scène']) && count($collaborateurs['Metteur en scène']) > 0)
                        <ul>
                            @foreach($collaborateurs['Metteur en scène'] as $metteur)
                            <li>{{ $metteur->firstname }} {{ $metteur->lastname }}</li>
                            @endforeach
                        </ul>
                        @else
                        <p>Aucun metteur en scène</p>
                        @endif
                    </div>

                    <div class="section">
                        <h2 class="section-title">Mots-clés</h2>
                        @if($show->tags->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($show->tags as $tag)
                            <li class="list-group-item">{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                        @else
                        <p class="card-text">Aucun mot-clé</p>
                        @endif
                    </div>
                </div>
            </div>

            <a href="{{ route('show.index') }}" class="btn btn-primary">Retour à l'index</a>
        </div>
    </div>
</div>
@endsection