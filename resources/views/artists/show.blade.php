@extends('layouts.main')

@section('title', ' Fiche d un artiste')

@section('content')

<h1>Liste des types</h1>
<h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>

<ul>
    @foreach($artist->types as $type)
    <li>{{ $type->type }}</li>
    @endforeach
</ul>




<nav> <a href="{{ route ('artist.index')}}"> Retour a la liste des artistes (index) <a></nav>
@endsection