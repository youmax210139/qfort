@extends('web.base')

@push('css')
<style>
    .card .content {
        background-color: #F6F6F6 !important;
    }
</style>
@endpush
@section('content')
@php
$items = [
Voyager::image('carousel/carousel3@2x.png'),
Voyager::image('carousel/carousel2@2x.png'),
// Voyager::image('carousel/carousel2@2x.png'),
];
@endphp
@carousel([
'items' => $items,
'type' => 'half'
])
@endcarousel
<section class="text-center my-5 container about">

    <!-- Section heading -->
    <h2 class="font-weight-bold my-5 text-left mb-5">New</h2>
    <h4 class="text-left mb-5">We are a diverse group of thinkers and inventors</h4>
    @php
    $items = [
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg",
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg",
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" ,
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg",
    ];
    @endphp
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
    <div class="card-columns">
        @foreach($items as $i => $item)
        <div class="card border-0">
            <div class="card-body">
                <div class="text-left px-2">
                    <!-- Featured image -->
                    <div class="mb-0">
                        <img class="img-fluid" src="{{ $item['img'] }}" alt="Sample image">
                    </div>
                    <div class="p-3 content">
                        <!-- Post title -->
                        <h4 class="font-weight-bold mb-3">
                            <strong>
                                How will nano technology change modern
                                medicine?
                            </strong>
                        </h4>
                        <!-- Post data -->
                        <p>June {{$i}}th, 2019 / <a class="text-success">The Latest News</a></p>
                        <!-- Excerpt -->
                        <p>{{ $item['text'] }}</p>
                        <!-- Read more button -->
                        <div class="text-right">
                            <a class="btn text-success font-weight-bold" href="/news/1">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>
@endsection