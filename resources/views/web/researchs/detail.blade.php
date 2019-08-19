@extends('web.base')

@push('css')
<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }

    .card-body {
        background-color: #F6F6F6;
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container">

    <!-- Section heading -->
    <h2 class="font-weight-bold my-5 text-left mb-5">Quantum Device & Computing</h2>
    <h4 class="text-left mb-5">Sub-title</h4>
    <p class="font-weight-bold mb-3">Our goal is to investigate the theory of quantum foundation such that it can be
        used in our CMOS compatible superconductor/semiconductor quantum devices or IBM-Q in the cloud. We plan not only
        to develop a better quantum code/algorithm, but also to compare our experimental results with those by IBM-Q. In
        a long run, we also aim to create an interface between QuTip (an open-source software for simulating the
        dynamics of open quantum systems) and IBM-Q, such that a quantum calculation can be compared directly with that
        of a quantum simulation. </p>

    @php
    $items = [
    Voyager::image('researchs/research1@2x.png'),
    Voyager::image('researchs/research2@2x.png'),
    Voyager::image('researchs/research3@2x.png'),
    ];
    @endphp

    <h2 class="font-weight-bold my-5 text-center mb-5">Outcomes from this area</h2>
    <div class="card-deck" id="outcomes">
        @foreach($items as $i => $item)
        <div class="card border-0">
            <img class="card-img-top" src="{{ $item }}" alt="Sample image">
            <div class="card-body text-left px-2">
                <h4 class="text-center font-weight-bold mb-3">
                    Item {{ $i}}
                </h4>
                <p>Our goal is to investigate the theory of quantum foundation such that it can be used in our
                    CMOS compatible superconductor/ semiconductor quantum devices or IBM-Q. In a long run, we
                    also aim to create an interface between QuTip</p>
                <!-- Read more button -->
                <div class="text-center">
                    <a class="btn btn-success font-weight-bold" href="/researchs/outcomes/1">More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h2 class="font-weight-bold my-5 text-center mb-5">People in this area</h2>
    @php
    $items = [
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg",
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg",
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" ,
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg",
    ];
    @endphp
    <!-- Grid row -->
    <div class="row">
        @foreach ($items as $item)
        <!-- Grid column -->
        <div class="col-lg-3 col-md-4 mb-2 mb-5">
            <div class="mx-auto">
                <img src="{{$item}}" class="rounded-circle img-fluid" alt="Sample avatar">
            </div>
            <a href="/peoples/michaelJordon">
                <h5 class="font-weight-bold mt-4 mb-3">
                    Anna Williams
                </h5>
            </a>
        </div>
        <!-- Grid column -->
        @endforeach
    </div>
    <!-- Grid row -->

</section>
@endsection