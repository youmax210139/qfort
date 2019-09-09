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
    header.fixed-top.bg-white.transparent .navbar-brand img
    {
        filter: invert(100%) sepia(4%) saturate(1101%) hue-rotate(182deg) brightness(116%) contrast(100%);
    }

    div.vh-100.fixed-top {
        background-size: cover !important;
    }
</style>
@endpush

{{-- @section('header')
@endsection --}}
@section('content')
<div class="w-100 vh-100 background-size-cover background-position-center fixed-top"
    style="background:url({{ Voyager::image(setting('whoweare.image'))}}); z-index:-1;background-repeat:no-repeat">
</div>
<section class="text-center py-5 container">

    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5">Who we are</h2>
    <p class="my-5 text-left h5 ">
        The Microsoft Internet of Things (IoT) Innovation Center was established back in 2016 as a key value creation
        hub for IoT in Asia that not only serves the region’s needs but also growing Global Demands in realizing new
        business value from IoT implementation.<br>
        We bring with us a rich set of experience and ecosystem in bridging the
        cloud, edge, hardware, connectivity and enterprise integration needed for IoT project deployments globally.
    </p>
    <img class="img-fluid" src="{{ Voyager::image('logos/ncku.svg')}} ">
    <h2 class="font-weight-bold text-center my-5">Our Logo</h2>
    <p class="my-5 text-left h5 ">
        The Microsoft Internet of Things (IoT) Innovation Center was established back in 2016 as a key value creation
        hub for IoT in Asia that not only serves the region’s needs but also growing Global Demands in realizing new
        business value from IoT implementation.
    </p>
    <img class="img-fluid" src="{{ Voyager::image('logos/qfort.svg')}} ">
    <p class="my-5 text-left h5 ">
        The Microsoft Internet of Things (IoT) Innovation Center was established back in 2016 as a key value creation
        hub for IoT in Asia that not only serves the region’s needs but also growing Global Demands in realizing new
        business value from IoT implementation.
    </p>
    <img class="img-fluid" src="{{ Voyager::image('taioan.jpg')}} ">

    <h2 class="font-weight-bold text-center my-5">Our Team</h2>
    <p class="my-5 text-left h5 ">
        The Microsoft Internet of Things (IoT) Innovation Center was established back in 2016 as a key value creation
        hub for IoT in Asia that not only serves the region’s needs but also growing Global Demands in realizing new
        business value from IoT implementation.
    </p>
    <div class="text-left">
        <p class="text-success h4">
            Management and staff
        </p>
        <p class="h5">Director: Hanson</p>
        <p class="h5">Director of Business Development: Kevin</p>
        <p class="h5">Director of Operations: Charlotte</p>
        <p class="text-success h4">
            Roadmap Leaders
        </p>
        <p class="h5">Leo, Alberts, Stephanie, Michael, Menno</p>
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