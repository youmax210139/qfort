<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>QFORT</title>
    <!-- Include Web Font -->
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <!-- Include CSS. -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    @stack('css')
</head>

<body>
    @section('header')@show
    <main>
        @yield('content')
    </main>
    @section('footer')@show
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('js')
</body>

</html>