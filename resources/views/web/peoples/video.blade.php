@extends('web.base')

@push('css')
<style>
    .aside .nav-item.active a,
    .aside .nav-item:hover a {
        color: #217D7B !important;
    }

    .sortmenu button,
    .sortmenu .dropdown-menu a {
        text-align: center !important;
    }

    .sortmenu .dropdown-menu a {
        padding: .5rem .5rem !important;
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container persion">
    <div class="row">
        <div class="d-lg-none w-100 mb-3 px-2">
            @sortmenu(['menus'=>$menus, 'text'=> 'Video'])@endsortmenu
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-6">
            <img class="img-fluid w-100" src="{{Voyager::image($people->image)}}">
        </div>
        <div class="col-lg-4 d-lg-flex justify-content-center align-items-center">
            <div class="bg-lg-white bg-xs-silver p-3">
                <h2 class="mb-5 font-weight-bold mb-2">{{ $people->name }}</h2>
                <h5 class="text-danger mb-2">{{ $people->researchArea }}</h5>
                <h5 class="mb-5">{{ $people->organization }}</h5>
                <a class="h5 text-dark" href="mailto:{{ $people->email }}">
                    <i class="fas fa-envelope fa-2x text-success mb-2 d-block text-center"></i>
                    {{ $people->email }}
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-none d-lg-flex col-lg-2 mt-5 aside">
            <ul class="nav flex-column text-left pt-3 border-top ">
                @foreach($menus as $i=>$menu)
                <li class="nav-item {{ $i==3?'active':''}} font-weight-light h5 mb-0">
                    @if($i==0 || $i==3)
                    <a class="nav-link pl-0 text-dark " href="{{ $menu->link }}">
                        {{ $menu->name }}</a>
                    @else
                    <a class="nav-link pl-0 text-dark " target="_blank" href="{{ $menu->link }}">
                        {{ $menu->name }}</a>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-10">
            <h1 class="mt-5 font-weight-bold mb-2"> Video </h1>
            @php
            $videos = $people->videos()->ordered()->get();
            $video = $videos[0]??null;
            $videos = $videos->splice(1);
            @endphp

            @if($video)
            <iframe class="w-100 vh-50 my-5" src="{{ str_replace('watch?v=', 'embed/', $video->link) }}" frameborder="0"
                allow="autoplay; encrypted-media" allowfullscreen>
            </iframe>
            @endif
            <ul class="list-group py-5">
                @foreach($videos as $video)
                <li class="list-group-item d-flex border-0 align-items-start ">
                    <i class="text-danger fab fa-youtube  fa-2x mr-3"></i>
                    <a class="text-dark h5 mb-0 text-left" target="_blank" href="{{ $video->link }}">
                        {{ $video->title }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection
