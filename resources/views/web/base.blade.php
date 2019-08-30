@extends('web.layout')

@push('css')
<style>
    body {
        letter-spacing: 1px;
        font-family: "Open Sans", serif;
        background-color: #fff;
        padding-top: 100px;
    }

    a:hover {
        cursor: pointer;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        line-height: 1.6;
    }

    .view .mask {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        width: 100%;
        height: 100%;
        background-attachment: fixed;
        background-color: #4d4f53;
    }

    .overlay .mask {
        opacity: 0;
        transition: all .5s ease;
    }

    .overlay .mask:hover {
        opacity: 0.3;
        cursor: pointer;
    }

    .zoom:hover img,
    .zoom:hover video {
        transform: scale(1.1);
    }

    .zoom img,
    .zoom video {
        transition: all 4s ease;
    }

    .view img,
    .view video {
        position: relative;
        display: block;
    }

    .view {
        position: relative;
        overflow: hidden;
        cursor: default;
    }
</style>
@endpush

@section('header')
{{ menu('user' , 'web.header') }}
@endsection

@section('footer')
@footer @endfooter
@endsection

@push('js')

@endpush