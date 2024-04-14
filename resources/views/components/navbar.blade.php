<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <div class="d-flex">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('artist.index') }}">Artistes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('show.index') }}">Spectacles</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('representation.index') }}">Reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">Profil</a>
                </li>
            </ul>
        </div>
    </div>
</nav>