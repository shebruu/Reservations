@extends('layouts.main')

@section('title', 'Fiche d\'un spectacle')

@section('content')

<style>
    .show-detail-img {
        height: 500px;
        width: 100%;
        object-fit: cover;
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
                    <h1 class="card-title">{{ $show->title }}</h1>

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

                    <h2>Liste des représentations</h2>
                    @if($show->representations->count() >= 1)
                    <ul class="list-group list-group-flush">
                        @foreach ($show->representations as $representation)
                        <li class="list-group-item">{{ $representation->when }}</li>
                        @endforeach
                    </ul>
                    @else
                    <p class="card-text">Aucune représentation</p>
                    @endif

                    <h2>Liste des artistes</h2>
                    <p class="card-text"><strong>Auteur:</strong> {{-- nom des auteurs --}}</p>
                    <p class="card-text"><strong>Metteur en scène:</strong> {{-- noms des metteurs en scène --}}</p>
                    <p class="card-text"><strong>Distribution:</strong> {{-- noms des comédiens --}}</p>
                </div>
            </div>

            <a href="{{ route('show.index') }}" class="btn btn-primary">Retour à l'index</a>
        </div>
    </div>
</div>
@endsection