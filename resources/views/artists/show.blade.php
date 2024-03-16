@extends('layouts.main')

@section('title', ' Fiche d un artiste')

@section('content')
<h1>{{$artist->firstname}} {{$artist->lastname}}</h1>

{{ dump($artist) }}

<div><a href="{{ route('artist.edit'), $artist->id }}">Modifier un nouvel artiste</a> </div>

<form method="post" action="{{ route ('artist.delete', artist->id) }}">

    @csrf
    @method('DELETE')
    <button type="submit">Supprimer</button>
</form>
<nav> <a href="{{ route ('artist.index')}}"> Retour a la liste des artistes (index) <a></nav>
@endsection