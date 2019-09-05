@extends('web.base')

@push('css')
<style>
    .nav-item.active a,
    .nav-item:hover a {
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
            @sortmenu(['menus'=>$menus, 'text'=> 'Overview'])@endsortmenu
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-6">
            <div class="vh-xs-50 h-lg-100 background-position-center background-size-cover"
                style="background-image: url({{Voyager::image($people->image)}})">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="bg-lg-white bg-xs-silver p-3">
                <h2 class="mb-5 font-weight-bold mb-2">{{ $people->name }}</h2>
                <h5 class="text-danger mb-2">{{ $people->fullDomain }}</h5>
                <h5 class="mb-5">{{ $people->department }}</h5>
                <a class="h5 text-dark" href="mailto:{{ $people->email }}">
                    <i class="fas fa-envelope fa-2x text-success mb-2 d-block text-center"></i>
                    {{ $people->email }}
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-none col-lg-2 d-lg-flex mt-5">
            <ul class="nav flex-column text-left pt-3 border-top ">
                @foreach($menus as $i=>$menu)
                <li class="nav-item {{ $i==0?'active':''}}">
                    <a class="nav-link pl-0 text-dark " href="{{ $menu->link }}">
                        {{ $menu->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-12 col-lg-10">
            <h1 class="my-3 my-lg-5 font-weight-bold"> Overview </h1>
            <div class="d-none d-lg-block text-right">
                <a href="{{ $people->resumeLink }}" 
                    class="d-none d-lg-inline-block btn btn-md bg-success text-white"
                    target="_blank">
                    <i class="fas fa-download"></i>
                    Download CV
                </a>
            </div>
            <div class="text-left">
                <h3 class="font-weight-bold">{{ $people->job }}</h3>
                {!! $people->content !!}
            </div>
            <a href="{{ $people->resumeLink }}" class="d-lg-none btn btn-md bg-success text-white my-5" target="_blank">
                <i class="fas fa-download"></i>
                Download CV
            </a>
        </div>
    </div>
</section>
@endsection