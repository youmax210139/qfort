<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-147269157-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-147269157-1');
    </script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>QFORT</title>
    <!-- Include Web Font -->
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <!-- Include CSS. -->
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    @stack('css')
</head>

<body>
    @section('header')@show
    <main>
        <input type="text" value="" id="clipboard" style="position:absolute;z-index:-100;opacity:0">
        @yield('content')
    </main>
    @section('footer')@show
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('js')
</body>

</html>