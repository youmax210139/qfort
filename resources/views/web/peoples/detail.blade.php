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
            <h5 class="text-danger mb-2">{{ $people->domain }}</h5>
            <h5 class="mb-5">{{ $people->department }}</h5>
            <p class="h5">
                <i class="fas fa-envelope fa-2x pr-2 text-success mb-2"></i>
                <br>EMail: mj@mail.ncku.edu.tw
            </p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-2 mt-5">
            <ul class="nav flex-column text-left pt-3 border-top ">
                <li class="nav-item active">
                    <a class="nav-link active pl-0 text-dark" href="{{ request()->fullUrl() }}">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-dark" href="{{ $people->lab }}">Lab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-dark" href="{{ $people->publication }}">Publication</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-dark" href="{{ $people->video }}">Video</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <h2 class="mt-5 font-weight-bold mb-2"> Overview </h2>
            <div class="text-right"><a href="" class="btn btn-md bg-success text-white"> Download CV</a></div>
            <p class="text-left font-weight-bold">
                <h3>{{ $people->job }}</h3>
                {!! $people->content !!}
            </p>
        </div>
    </div>
</section>
@endsection