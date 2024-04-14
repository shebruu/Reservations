@extends('layouts.main')

@section('title', 'Liste des représentations des spectacles')

@push('styles')
<style>
    .card-header {
        background-color: #007BFF;
        color: white;
    }

    .card-body {
        background-color: #f8f9fa;
    }

    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des représentations</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($representations as $representation)
        <div class="col">
            <div class="card h-100">
                <div class="card-header text-center">
                    {{ \Carbon\Carbon::parse($representation->when)->format('d M Y') }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $representation->show->title }}</h5>
                    <p class="card-text"><strong>Lieu:</strong> {{ $representation->location->designation ?? 'Non spécifié' }}</p>
                    <p class="card-text"><strong>Heure:</strong> {{ \Carbon\Carbon::parse($representation->when)->format('G:i') }}</p>
                    <p class="card-text"><strong>Prix:</strong> {{ $representation->show->price }} €</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('representation.show', $representation->id) }}" class="btn btn-primary">Détails</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection