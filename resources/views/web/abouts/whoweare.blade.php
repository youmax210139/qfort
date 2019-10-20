@extends('web.base')

@push('css')
<style>
    section.container {
        margin-top: 100vh !important;
    }

    body,
    main,
    footer,
    body {
        background-color: #fff !important;
    }

    header.fixed-top.bg-white.transparent,
    header.fixed-top.bg-white.transparent .dropdown-menu {
        background-color: rgba(255, 255, 255, 0) !important;
        color: white !important;
    }

    header.fixed-top.bg-white.transparent a.text-dark,
    header.fixed-top.bg-white.transparent i.fas.fa-bars {
        color: white !important;
    }

    header.fixed-top.bg-white.transparent .navbar-brand img {
        filter: invert(100%) sepia(4%) saturate(1101%) hue-rotate(182deg) brightness(116%) contrast(100%);
    }

    div.vh-100.fixed-top {
        background-size: cover !important;
    }
</style>
@endpush

@section('content')
@if($carousel->source)
<div class="w-100 vh-100 background-size-cover background-position-center fixed-top"
    style="background:url({{ Voyager::image($carousel->source) }}); z-index:-1;background-repeat:no-repeat">
</div>
@endif
<section class="py-5 container">
    <div class="content">
        {!! setting('whoweare.content') !!}
    </div>
</section>
@endsection
@push('js')
<script>
    function headerTransition(){
        if($(window).scrollTop()>=$(window).height()){
            $('header.fixed-top').removeClass('transparent');
        }
        else{
            $('header.fixed-top').addClass('transparent');
        }
    }
    $(function(){
        headerTransition();
        $(window).scroll(function(){
            headerTransition();
        });
});
</script>
@endpush
