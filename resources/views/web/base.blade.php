@extends('web.layout')

@push('css')
<style>
    body {
        letter-spacing: 1px;
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