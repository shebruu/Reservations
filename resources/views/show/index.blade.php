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
        @include('show.partials.shows', ['shows' => $shows])
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