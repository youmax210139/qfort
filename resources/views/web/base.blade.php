@extends('web.layout')

@push('css')
<style>
    body {
        letter-spacing: 1px;
        font-family: "Open Sans", serif;
        background-color: #fff;
        padding-top: 148px;
    }

    @media (min-width: 992px) {
        body {
            padding-top: 123px;
        }
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 80%;
        }
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

    a:hover {
        cursor: pointer;
        text-decoration: none;
    }

    a.text-dark:hover {
        color: #217D7B !important;
    }

    a.text-dark.active,
    a.text-dark.active:hover {
        background-color: #000 !important;
        color: #fff !important;
    }

    a.text-white:hover,
    a.text-white.active,
    a.text-white.active:hover {
        background-color: rgb(62, 58, 57) !important;
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

    .content img {
        max-width: 100% !important;
    }

    .custom-control-label input{
        margin-left: .4rem;
        font-size: .8rem;
        font-weight: 400;
        line-height: 1.6;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
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