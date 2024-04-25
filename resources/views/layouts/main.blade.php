<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles personnalisés pour ajuster les images et les boutons -->
    <style>
        .custom-img-size {
            height: 200px;

            object-fit: cover;

            width: 100%;
        }

        /* les cartes ont une disposition de flexbox et étendent verticalement */
        .card-flex-container {
            display: flex;
            flex-direction: column;
            /*couvre l espace dédié ss deformation */
            height: 100%;
        }

        /*  corps de la carte se développe pour pousser le bouton vers le bas */
        .card-body-flex {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* marges au bouton */
        .card-footer .btn {
            margin-top: auto;
            /*pousser le bouton vers le bas */
        }
    </style>
    @stack('styles')
    @livewireStyles
</head>



<!-- @viteReactRefresh -->
@vite(['resources/css/app.css', 'resources/js/app.jsx'])

<body>

    @include('components.navbar') <!-- Cela inclut votre menu de navigation -->
    <div class="container">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @livewireScripts
</body>

</html>