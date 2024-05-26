<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

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
    </style>
    @stack('styles')
    @livewireStyles
</head>

<body>
    <div id="app" data-user="{{ Auth::check() ? json_encode(Auth::user()) : '{}' }}">
        <!-- React will render here -->
    </div>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @livewireScripts
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</body>

</html>