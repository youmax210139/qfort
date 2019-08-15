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
    {{ menu('user' , 'web.header') }}
    <main>
        @yield('content')
    </main>
    @footer @endfooter
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            console.log('12345');
            $("#app-header").sticky();
        });
    </script>
    @stack('js')
</body>

</html>