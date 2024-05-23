<style>
    .navbar-custom {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0.5rem 1rem;
    }

    .navbar-brand {
        position: absolute;
        left: 1rem;
        top: 0.5rem;
    }

    .navbar-brand img {
        height: 140px;
        object-fit: contain;
    }

    .navbar-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .navbar-custom .nav-link {
        color: #000000;
        padding: 0.5rem 1rem;
        font-size: 1rem;

        margin: 0 1rem;
    }



    .navbar-nav .nav-link:last-child {
        margin-right: 0;
    }
</style>


<nav class="navbar navbar-expand navbar-light bg-light navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="images/logo_transparent.png" alt="Logo">
        </a>
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="{{ route('home') }}">Accueil</a>

            <a class="nav-item nav-link" href="{{ route('show.index') }}">Spectacles</a>
            <a class="nav-item nav-link" href="{{ route('representation.index') }}">Réservations</a>
            <a class="nav-item nav-link" href="{{ route('profile.edit') }}">Profil</a>
        </div>
    </div>
</nav>