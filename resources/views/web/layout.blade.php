<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>QFORT</title>
    <!-- Include CSS. -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    @section('css')

    @show
</head>

<body>

    {{ menu('user' , 'web.header') }}
    @yield('content')
    @footer @endfooter
    <script src="{{ mix('js/app.js') }}"></script>
    @section('js')@show
</body>

</html>