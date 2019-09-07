@extends('web.base')
@push('css')
<style>
    .rounded-bottom {
        border-bottom-right-radius: 1.5rem !important;
        border-bottom-left-radius: 1.5rem !important;
    }
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
<section class="text-center my-5 container news">
    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5">Follow us</h2>
    <div class="row d-none d-md-flex">
        <!-- Grid column -->
        <div class="col">
            <i class="fab fa-facebook fa-2x"></i>
            <h5 class="font-weight-light my-4">You will find the latest update.</h5>
            </p>
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col">
            <i class="fab fa-youtube fa-2x"></i>
            <h5 class="font-weight-light my-4">You will find the latest video about our center.</h5>
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col">
            <i class="fab fa-linkedin fa-2x"></i>
            <h5 class="font-weight-light my-4">You will find professional networking here.</h5>
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col">
            <i class="fab fa-instagram fa-2x"></i>
            <h5 class="font-weight-light my-4">You will find the latest photos we share.</h5>
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col">
            <i class="fab fa-twitter fa-2x"></i>
            <h5 class="font-weight-light my-4">Here we inform you the coming events.</h5>
        </div>
        <!-- Grid column -->
    </div>
    <!-- Grid row -->
    @php
    $items = [
    ['img'=> Voyager::image('index/event1@2x.png'), 'text'=>str_random(80)],
    ['img'=> Voyager::image('index/event2@2x.png'), 'text'=>str_random(160)],
    ['img'=> Voyager::image('index/event3@2x.png'), 'text'=>str_random(20)],
    ['img'=> Voyager::image('index/event4@2x.png'), 'text'=>str_random(40)],
    ['img'=> Voyager::image('index/event1@2x.png'), 'text'=>str_random(200)],
    ['img'=> Voyager::image('index/event2@2x.png'), 'text'=>str_random(10)],
    ['img'=> Voyager::image('index/event3@2x.png'), 'text'=>str_random(60)],
    ['img'=> Voyager::image('index/event4@2x.png'), 'text'=>str_random(220)]
    ]
    @endphp
    <!-- Card -->
    <div class="card-columns card-col-lg-4 card-col-xs-1">
        @foreach($items as $item)
        <div class="card border-0">
            <div class="card-body p-3 border border-light-green">
                <img class="card-img-top" src="{{ $item['img'] }}">
                <p class="card-text py-2">{{ $item['text'] }}</p>
            </div>
            <div
                class="card-footer bg-light-green rounded-bottom text-white d-flex justify-content-start align-items-center p-3">
                <i class="fas fa-thumbs-up mx-2"></i>
                <span>16</span>
                <i class="fas fa-comment-alt mx-2"></i>
                <span>56</span>
                <a href="/" class="ml-auto mr-2 text-white">
                    <i class=" fab fa-facebook-f "></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection