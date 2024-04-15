@extends('layouts.main')

@section('title', 'Fiche d\'une représentation')

@section('content')
<article class="container mt-5">


    @can('can-reserve')
    <p>L'utilisateur peut réserver.</p>
    <p>Rôles actuels:</p>
    <ul>
        @foreach(Auth::user()->roles as $role)
        <li>{{ $role->role }}</li>
        @endforeach
    </ul>
    @else
    <p>L'utilisateur ne peut pas réserver.</p>
    @endcan



    <h1 class="text-center">Représentation du {{ $date }} à {{ $time }}</h1>
    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>Spectacle:</strong> {{ $representation->show->title }}</p>
            <p class="card-text"><strong>Lieu:</strong>
                @if($representation->location)
                {{ $representation->location->designation }}
                @elseif($representation->show->location)
                {{ $representation->show->location->designation }}
                @else
                <em>à déterminer</em>
                @endif
            </p>
            <!-- Bouton de réservation -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                @auth
                @if(Auth::user()->hasRole('member') || Auth::user()->hasRole('affiliate'))

                <form method="POST" action="{{ route('representation.book', $representation->id) }}">
                    @csrf
                    <label for="places">Nombre de places:</label>
                    <input type="number" id="places" name="places" value="1" min="1" required>

                    <button type="submit" class="btn btn-primary">Réserver maintenant</button>
                </form>

                @endif
                @endauth

                <a href="{{ route('representation.index') }}" class="btn btn-secondary">Retour à l'index</a>

            </div>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
</article>
@endsection