<!-- resources/views/layouts/navbar_non_connected.blade.php -->
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

    .nav-column {
        position: relative;
        display: inline-block;
    }

    .nav-item {
        text-decoration: none;
        color: black;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .nav-column:hover .dropdown-content {
        display: block;
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
            <div class="nav-column">
                <a class="nav-item nav-link" href="{{ route('profile.edit') }}">Se connecter </a>
                <div class="dropdown-content">
                    <a class="nav-item nav-link" href="{{ route('register') }}">S'inscrire</a>
                </div>
            </div>
        </div>
    </div>
</nav>