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
    <!-- Card -->
    <div class="card-columns">
        @foreach($articles as $i => $article)
        <div class="card border-0">
            <div class="card-body">
                <div class="text-left px-2">
                    <!-- Featured image -->
                    <div class="mb-0 view overlay zoom">
                        <a href="{{ route('web.news.detail', $article->id)}}">
                            <img class="img-fluid" src="{{ Voyager::image($article->image) }}">
                            <div class="mask"></div>
                        </a>
                    </div>
                    <div class="p-3 content">
                        <!-- Post title -->
                        <h4 class="font-weight-bold mb-3">
                            {{ $article->title }}
                        </h4>
                        <!-- Post data -->
                        <p>{{ $article->created_at }} /
                            <span class="text-success">The Latest News</span>
                        </p>
                        <p>{{ $article->abstract }}</p>
                        <div class="text-right">
                            <a class="btn text-success font-weight-bold"
                                href="{{ route('web.news.detail', $article->id)}}">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>
@endsection