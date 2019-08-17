@extends('web.base')

@push('css')
<style>

</style>
@endpush
@section('content')
@php
$items = [
Voyager::image('carousel/carousel1@2x.png'),
Voyager::image('carousel/carousel2@2x.png'),
];
@endphp
@section('content')
@carousel([
'items' => $items
])
@endcarousel
<section class="text-center my-5 container news">

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