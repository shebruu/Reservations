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
    @if(auth()->check())
    <p>Bonjour, {{ auth()->user()->firstname }}!</p>
    <p>Votre email: {{ auth()->user()->email }}</p>
    <p>Votre rôle: {{ auth()->user()->roles->pluck('role')->implode(', ') }}</p>
    @endif

    <!-- Formulaire de recherche et de tri -->
    <form id="searchForm" class="mb-4">
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" name="search" id="search" class="form-control" placeholder="Recherche par nom de spectacle" value="{{ request('search') }}">
            </div>
            <div class="col-md-6">
                <select name="tag" id="tag" class="form-control">
                    <option value="">Trier par tag</option>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->name }}" {{ request('tag') == $tag->name ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <div class="row row-cols-1 row-cols-md-3 g-4" id="showsContainer">
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
                    @if(auth()->check() && auth()->user()->hasRole('admin'))
                    <a href="{{ route('show.edit', $show->id) }}" class="btn btn-primary">Éditer ce spectacle</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const tagSelect = document.getElementById('tag');
        const showsContainer = document.getElementById('showsContainer');
        const searchForm = document.getElementById('searchForm');

        function fetchShows() {
            const query = new URLSearchParams(new FormData(searchForm)).toString();
            fetch(`{{ route('show.index') }}?${query}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    showsContainer.innerHTML = data.shows;
                });
        }

        searchInput.addEventListener('input', fetchShows);
        tagSelect.addEventListener('change', fetchShows);
    });
</script>
@endpush
@endsection