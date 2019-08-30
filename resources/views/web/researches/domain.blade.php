@extends('web.base')

@push('css')
<style>
    #domain .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }

    #domain .card-body {
        background-color: #F6F6F6;
    }

    #domain .nav-item:hover .nav-link,
    #domain .nav-item.active .nav-link {
        color: #217D7B !important;
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container" id="domain">

    <h1 class="font-weight-bold text-left mb-0">{{ $domain->title }}</h1>
    <h4 class="text-left mb-4 font-weight-light text-grey">{{ $domain->subTitle}}</h4>
    <div class="row">
        <div class="col-9">
            <p class="mb-3 h5 text-left">{{ $domain->description }}</p>
        </div>
        <div class="col-3">
            <ul class="nav flex-column border-top border-dark justify-content-center h-100 text-left">
                @foreach($domains as $d)
                <li class="nav-item {{ $domain->id == $d->id?'active':'' }}">
                    <a class="nav-link text-dark pl-0" href="{{ route('web.researches.domains.detail', $d->id) }}">
                        {{ $d->title}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @php
    $items = [
    Voyager::image('researchs/research1@2x.png'),
    Voyager::image('researchs/research2@2x.png'),
    Voyager::image('researchs/research3@2x.png'),
    ];
    @endphp

    <h2 class="font-weight-bold my-5 text-center mb-5">Outcomes from this area</h2>
    <div class="card-deck" id="outcomes">
        @foreach($researchs as $research)
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
                    <a class="btn btn-success font-weight-bold"
                        href="{{ route('web.researches.detail', $research->id)}}">More</a>
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