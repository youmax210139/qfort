@extends('web.base')

@push('css')
<style>
    .content {
        height: auto;
        min-height: 60vh;
    }

    .content img {
        max-width: 100%;
        height: auto;
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container about">
    <div class="row">
        <div class="col-12 col-md-4 ">
            <div class="border mt-5 border-dark">
                <img src="{{Voyager::image('news/news7@2x.png')}}" alt="" class="img-fluid mb-4">
                <div class="row mx-0 mb-4">
                    <div class="col-2 text-right pr-0">
                        <i class="fas fa-calendar-alt fa-1x"></i>
                    </div>
                    <div class="col-8 text-left">
                        <h5 class="font-weight-bold mb-2">
                            August 1 – 30, 2019
                        </h5>
                        <p class="mb-2">See event details for additional info.</p>
                        <a class="text-success">Add to my calendar</a>
                    </div>
                </div>
                <div class="row mx-0 mb-4">
                    <div class="col-2 text-right pr-0">
                        <i class="fas fa-map-marker-alt fa-1x"></i>
                    </div>
                    <div class="col-8 text-left">
                        <h5 class="font-weight-bold mb-2">
                            Coulter Art Gallery
                        </h5>
                        <a class="text-success" target="_blank" href="{{ $event->location }}">
                            Open in map
                        </a>
                    </div>
                </div>
                <div class="row mx-0 mb-4">
                    <div class="col-2 text-right pr-0">
                        <i class="fas fa-envelope fa-1x"></i>
                    </div>
                    <div class="col-8 text-left">
                        <a class="text-success" href="mailto:{{ $event->email}}">
                            Email sponsor
                        </a>
                    </div>
                </div>
                <div class="row mx-0 mb-4">
                    <div class="col-2 text-right pr-0">
                        <i class="fas fa-phone fa-1x"></i>
                    </div>
                    <div class="col-8 text-left">
                        <h5 class="font-weight-bold mb-2">
                            650-725-3107
                        </h5>
                    </div>
                </div>
                <div class="row mx-0 mb-4">
                    <div class="col-2 text-right pr-0">
                        <i class="fas fa-users fa-1x"></i>
                    </div>
                    <div class="col-8 text-left">
                        <h5 class="font-weight-bold mb-2">
                            This Event is open to:
                        </h5>
                        Everyone
                    </div>
                </div>
                <div class="row mx-0 mb-4">
                    <div class="col-2 text-right pr-0">
                        <i class="fas fa-tag fa-1x"></i>
                    </div>
                    <div class="col-8 text-left">
                        <p class="font-weight-bold mb-2">
                            {{ $event->price > 0? $event->price : 'Free'}}
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-md-8">
            <!-- Section heading -->
            <h2 class="font-weight-bold mt-5 text-left mb-3">{{ $event->title }}</h2>
            <h4 class="text-left mb-5">{{ $event->abstract }}</h4>
            <div class="content">
                {!! $event->content !!}
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-md-9 mb-4 text-center text-md-left">
                    @social @endsocial
                </div>
                <div class="col-12 col-md-3 mb-4">
                    <a href="" class="btn btn-outline-success form-control">Register</a>
                </div>
            </div>
        </div>
        <div class="col mt-2 p-2 justify-content-center d-flex">
            <a class="btn" href="#" tabindex="-1">
                Previous Article
            </a>
            <a class="btn btn-success mx-5" href="#" tabindex="-1">
                Event Overview
            </a>
            <a class="btn" href="#">
                Next Article
            </a>

        </div>
    </div>



</section>
@endsection