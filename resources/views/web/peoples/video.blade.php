@extends('web.base')

@push('css')
<style>

</style>
@endpush
@section('content')
<section class="text-center my-5 container persion">
    <div class="row">
        <div class="d-lg-none w-100 mb-3 px-2">
            @sortmenu(['menus'=>$menus, 'text'=> 'Overview'])@endsortmenu
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-6">
            <img src="{{Voyager::image($people->image)}}" class="img-fluid">
        </div>
        <div class="col-lg-4">
            <h2 class="my-5 font-weight-bold mb-2">{{ $people->name }}</h2>
            <h5 class="text-danger mb-2">{{ $people->fullDomain }}</h5>
            <h5 class="mb-5">{{ $people->department }}</h5>
            <p class="h5">
                <i class="fas fa-envelope fa-2x text-success mb-2 d-block text-center"></i>
                {{ $people->email }}
            </p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-none d-lg-flex col-lg-2 mt-5">
            <ul class="nav flex-column text-left pt-3 border-top ">
                @foreach($menus as $i=>$menu)
                <li class="nav-item {{ $i==0?'active':''}}">
                    <a class="nav-link pl-0 text-dark " href="{{ $menu->link }}">
                        {{ $menu->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        @php
        $link = 'https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG';
        @endphp
        <div class="col-lg-10">
            <h2 class="mt-5 font-weight-bold mb-2"> Video </h2>
            @php
                $video = $people->videos[0]??null;
                $videos = $people->videos->splice(1);
            @endphp
            
            @if($video)
                <iframe class="w-100 vh-50 my-5" src="{{ str_replace('watch?v=', 'embed/', $video->link) }}" 
                    frameborder="0" allow="autoplay; encrypted-media"
                    allowfullscreen>
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