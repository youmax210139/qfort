@extends('web.base')

@push('css')
<style>
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
            <h2 class="font-weight-bold my-5 text-center mb-5">Outcomes from this area</h2>
            <div class="row">
                @foreach($domain->researches as $research)
                <div class="col-md-6 col-12 mb-3">
                    @post(['item'=>$research, 'href'=>route('web.researches.detail', $research->id)]) @endpost
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
        </div>
        <div class="col-3">
            <ul class="nav flex-column border-top border-dark justify-content-start h-100 text-left pt-5">
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
</section>
@endsection