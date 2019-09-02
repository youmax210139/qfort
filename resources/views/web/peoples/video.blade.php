@extends('web.base')

@push('css')
<style>
    .nav-item.active a,
    .nav-item:hover a {
        color: #217D7B !important;
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container persion">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <img src="{{Voyager::image($people->image)}}" class="img-fluid">
        </div>
        <div class="col-md-4">
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
        <div class="col-md-2 mt-5">
            <ul class="nav flex-column text-left pt-3 border-top ">
                <li class="nav-item">
                    <a class="nav-link pl-0 text-dark" href="{{ route('web.peoples.detail', $people->id) }}">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-dark" href="{{ $people->lab }}">Lab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-dark" href="{{ $people->publication }}">Publication</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link pl-0 text-dark " href="{{ route('web.peoples.video', $people->id) }}">Video</a>
                </li>
            </ul>
        </div>
        @php
        $link = 'https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG';
        @endphp
        <div class="col-md-10">
            <h2 class="mt-5 font-weight-bold mb-2"> Video </h2>
            <iframe class="w-100 vh-50 my-5" src="{{ $link }}" frameborder="0" allow="autoplay; encrypted-media"
                allowfullscreen></iframe>
            <ul class="list-group py-5">
                <li class="list-group-item d-flex border-0 align-items-center">
                    <i class="text-danger fab fa-youtube  fa-2x mr-3"></i>
                    <a class="text-dark h5 mb-0" target="_blank" href="{{ $link }}">AlterEgo: Interfacing with devices
                        through silent speech Mar 13, 2018 · in Biomechatronics</a>
                </li>
                <li class="list-group-item d-flex border-0 align-items-center">
                    <i class="text-danger fab fa-youtube  fa-2x mr-3"></i>
                    <a class="text-dark h5 mb-0" target="_blank" href="{{ $link }}">Walking upstairs after the AMI
                        procedure May 29, 2018 · in Biomechatronics</a>
                </li>
                <li class="list-group-item d-flex border-0 align-items-center">
                    <i class="text-danger fab fa-youtube  fa-2x mr-3"></i>
                    <a class="text-dark h5 mb-0" target="_blank" href="{{ $link }}">Interfacing with devices through
                        silent speech Jan 02, 2018 · in Biomechatronics</a>
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection