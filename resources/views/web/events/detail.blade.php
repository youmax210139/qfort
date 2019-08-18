@extends('web.base')

@push('css')
<style>
    .md-v-line {
        position: absolute;
        border-left: 1px solid rgba(0, 0, 0, .125);
        height: 50px;
        top: 0px;
        left: 54px;
    }

    .fas {
        font-size: 1.4rem;
    }

    .btn-floating {
        vertical-align: middle;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        transition: all .2s ease-in-out;
        border-radius: 50%;
        padding: 0;
        cursor: pointer;
        width: 2rem;
        height: 2rem;
        border-width: 2px;
        font-size: 1rem;
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
                        <a class="text-success">Open in map</a>
                    </div>
                </div>
                <div class="row mx-0 mb-4">
                    <div class="col-2 text-right pr-0">
                        <i class="fas fa-envelope fa-1x"></i>
                    </div>
                    <div class="col-8 text-left">
                        <h4 class="text-success">
                            Email sponsor
                        </h4>
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
                        <h5 class="font-weight-bold mb-2">
                            Free
                        </h5>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-md-8">
            <!-- Section heading -->
            <h2 class="font-weight-bold mt-5 text-left mb-3">Conferences</h2>
            <h4 class="text-left mb-5">How will nano technology change modern medicine?</h4>
            <img src="{{ Voyager::image('logos/qfort.svg')}}" alt="" width="100%" height="800px">
            <div class="row align-items-center">
                <div class="col-12 col-md-2 d-flex mb-4 p-md-0 justify-content-center">
                    Share this post:
                </div>
                <div class="d-flex col-12 col-md-8 mb-4 justify-content-center  justify-content-md-start">
                    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-instagram"></i></a>
                    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-twitter"></i></a>
                    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-youtube"></i></a>
                    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fas fa-envelope"></i></a>
                    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-line"></i></a>
                    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="col-12 col-md-2 mb-4 p-md-0">
                    <a href="" class="btn btn-outline-success form-control">Register</a>
                </div>

            </div>
        </div>
        <div class="col p-5 justify-content-center d-flex">
            <div class="col-4 d-flex justify-content-end">
                <a class="btn" href="#" tabindex="-1">
                    Previous Article
                </a>
            </div>

            <div class="col-4 d-flex justify-content-center">
                <a class="btn btn-success mx-5" href="#" tabindex="-1">
                    Event Overview
                </a>
            </div>

            <div class="col-4 d-flex justify-content-start">
                <a class="btn" href="#">
                    Next Article
                </a>
            </div>
        </div>
    </div>



</section>
@endsection