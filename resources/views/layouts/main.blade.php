<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/sidebarstyle.css') }}" rel="stylesheet"> <!-- Inclure le fichier CSS du sidebar -->


    @include('feed::links')
    <style>
        .custom-img-size {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .card-flex-container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-body-flex {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-footer .btn {
            margin-top: auto;
        }

        h1 {
            font-size: 2.5rem !important;
            /* Taille de police pour le titre */
            font-weight: 700 !important;
            /* Poids de police pour le titre */
        }

        .content {
            margin-left: 252px;
            /* La largeur du sidebar + 2px de décalage */
            padding: 20px;
        }
    </style>
    @stack('styles')
    @livewireStyles
</head>

<body>
    <div class="container-fluid">
        <!-- Sidebar -->
        <div class="sidebar">
            @include('sidebar')
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @livewireScripts
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</body>

</html>