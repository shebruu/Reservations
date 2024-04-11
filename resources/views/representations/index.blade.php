@extends('layouts.main')

@section('title', 'Liste des représentations')

@push('styles')

@endpush

@section('content')

<div class="container">
    <div class="artist-header text-center">
        <h1>Liste des {{ $resource }}</h1>
    </div>


    <ul>
        @foreach($representations as $representation)
        <li>{{ $representation->show->title }}
            @if($representation->location)
            - <span>{{ $representation->location->designation }}</span>
            @endif
            - <datetime>{{ substr($representation->when,0,-3) }}</datetime>
        </li>
        @endforeach
    </ul>
</div>
@endsection