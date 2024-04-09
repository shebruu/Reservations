@extends('layouts.main')

@section('title', 'Liste des spectacles')



@push('styles')
<style>
    .custom-img-size {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }
</style>
@endpush
@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des spectacles</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($shows as $show)
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/'.$show->poster_url) }}" class="card-img-top custom-img-size" alt="Image du spectacle">
                <div class="card-body">
                    <h5 class="card-title">{{ $show->title }}</h5>
                    <p class="card-text">{{ $show->price }} €</p>
                    <p class="card-text">
                        @if($show->representations->count() === 1)
                        1 représentation
                        @elseif($show->representations->count() > 1)
                        {{ $show->representations->count() }} représentations
                        @else
                        aucune représentation
                        @endif
                    </p>
                    <a href="{{ route('show.show', $show->id) }}" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection