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