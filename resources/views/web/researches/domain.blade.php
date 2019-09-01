@extends('web.base')

@push('css')
<style>
    #domain .w-100.img-fluid {
        height: 25vh;
        object-fit: cover;
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

    <h2 class="font-weight-bold my-5 text-center mb-5">Outcomes from this area</h2>
    <div class="row">
        @foreach($domain->researches as $research)
        <div class="col-md-6 col-12 mb-3">
            <div class="h-100 bg-sliver position-relative">
                <img class="w-100 img-fluid" src="{{ Voyager::image($research->image) }}">
                <div class="text-left px-3 pt-3 pb-5">
                    <h4 class="text-center font-weight-bold mb-3 ">
                        {{ $research->title }}
                    </h4>
                    <p>{!! $research->abstract !!}</p>
                </div>
                <!-- Read more button -->
                <div class="position-absolute w-100 mb-3" style="bottom:0">
                    <a class="btn btn-success font-weight-bold"
                        href="{{ route('web.researches.detail', $research->id)}}">
                        More
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h2 class="font-weight-bold my-5 text-center mb-5">People in this area</h2>
    <!-- Grid row -->
    <div class="row">
        @foreach ($domain->peoples as $people)
        <!-- Grid column -->
        <div class="col-lg-3 col-md-4 mb-2 mb-5">
            @figure(['item' => $people]) @endfigure
            <p class="text-uppercase blue-text font-weight-bold">
                {{ $people->job }}
            </p>
        </div>
        <!-- Grid column -->
        @endforeach
    </div>
    <!-- Grid row -->

</section>
@endsection