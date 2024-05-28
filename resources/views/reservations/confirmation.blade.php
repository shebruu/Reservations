@extends('layouts.main')

@section('title', 'Confirmation de Réservation')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Confirmation de Réservation</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Votre réservation a été effectuée avec succès !</h5>
            <p class="card-text"><strong>Spectacle:</strong> {{ $reservation->representation->show->title }}</p>
            <p class="card-text"><strong>Date:</strong> {{ $reservation->representation->when }}</p>
            <p class="card-text"><strong>Nombre de places:</strong> {{ $reservation->places }}</p>
        </div>
    </div>
    <a href="{{ route('representation.index') }}" class