@extends('layouts.main')

@section('title', ' Fiche d un artiste')

@section('content')
<h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>

<h2>Liste des types</h2>
<ul>
    @foreach($artist->types as $type)
    <li>{{ $type->type }}</li>
    @endforeach
</ul>


{{ dump($artist) }}


<div><a href="{{ route('artist.edit'), $artist->id }}">Modifier un nouvel artiste</a> </div>

<form method="post" action="{{ route ('artist.delete', artist->id) }}">

    @csrf
    @method('DELETE')
    <button type="submit">Supprimer</button>
</form>
<nav> <a href="{{ route ('artist.index')}}"> Retour a la liste des artistes (index) <a></nav>
@endsection