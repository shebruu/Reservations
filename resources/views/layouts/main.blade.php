<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
</head>

{inclure les scripts et link de vite pr charger assets react}
@viteReactRefresh
@vite(['resources/css/app.css', 'resources/js/app.jsx'])

<body>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>