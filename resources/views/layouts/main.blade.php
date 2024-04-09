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
</head>



<!-- @viteReactRefresh -->
@vite(['resources/css/app.css', 'resources/js/app.jsx'])

<body>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>