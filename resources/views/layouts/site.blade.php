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
            href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
    @vite(['resources/css/app.css'])
    {{--@vite(['resources/css/app.css', 'resources/js/app.js'])--}}
@stack('styles')

</head>
<body class="page_fix">
@include('partials.header')
<!--header-wrap-->
<div class="content-wrapper">
    @yield('content')
</div>

@include('partials.footer')
@include('partials.reg-form')

@stack('scripts')
</body>
</html>
