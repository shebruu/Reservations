{{-- resources/views/artists/create.blade.php --}}
@extends('layouts.main')

@section('title', 'Créer un nouvel artiste')

@section('content')
<h1>Créer un nouvel artiste</h1>

<form action="{{ route('artist.store') }}" method="POST">
    @csrf
    <div>
        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname" required>
    </div>
    <div>
        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname" required>
    </div>
    <button type="submit">Créer</button>
</form>
@endsection