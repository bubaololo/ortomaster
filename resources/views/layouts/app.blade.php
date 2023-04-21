<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <link rel="icon" type="image/x-icon" href="favicon32.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2?family=Montserrat&family=Nunito:wght@400;600&family=Poppins:ital@1&display=swap"
            rel="stylesheet">

    @livewireStyles

@stack('styles')

<!-- Scripts -->
    {{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}

    {{--    <link rel="stylesheet" href="{{ asset('build/assets/app.525f5899.css') }}">--}}
    {{--    <script src="{{ asset('build/assets/app.340e5d39.js') }}"></script>--}}

</head>
<body>

<!--header-wrap-->
<div class="content-wrapper">
    @yield('content')
    {{ $slot }}
</div>
</body>
</html>
