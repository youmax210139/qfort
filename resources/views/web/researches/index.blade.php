@extends('web.base')

@push('css')
<style>
    #overview, #focus {
        display: block;
        position: relative;
        top: -148px;
        visibility: hidden;
    }

    @media (min-width: 992px) {
        #overview, #focus {
            display: block;
            position: relative;
            top: -123px;
            visibility: hidden;
        }
    }
</style>
@endpush
@section('content')
<a id="overview"></a>
<section class="text-center my-5 container">
    <h1 class="font-weight-bold text-left mb-2">Our Focus</h1>
    <h3 class="text-left mb-2">Sub-title</h3>
    <p class="mb-3 h5 text-left">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
        Ipsum
        has been the
        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
        scrambled
        it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
        PageMaker
        including versions of Lorem Ipsum
    </p>
</section>
<section class="text-center my-5 bg-dark-silver text-white">
    <div class="container">
        <!-- Section heading -->
        <div class="row py-5">
            <div class="col-12 col-lg-6 pr-lg-5 mb-3 mb-lg-0">
                <img src="{{ Voyager::image('roadmap.jpg') }}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-lg-6 p-lg-5">
                <div class="d-flex flex-column h-100 justify-content-center text-left">
                    <h1 class="mb-3">Our R&D Roadmap</h1>
                    <p class="mb-3 h5 text-left"> QFort has a six-year R&D roadmap to conduct world - leading
                        research.
                        Key
                        milestones are planned for each focus area. All these will be integrated to innovate
                        groundbreaking
                        quantum technology and to make a better society.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container bg-white">
    <p class="mb-5 h5 text-left">
        QFort takes an interdisciplinary approach to make discoveries and to bring up the most advanced research
        outcomes. Our team includes researchers from diverse research areas. In addition, we has built up an
        international research platform to connect with partners or consultants around the world. This cooperation
        leads
        to continuous effort to deal with the most challenging scientific issues.
    </p>
</div>
<a id="focus"></a>
<div class="bg-xs-light-silver bg-lg-white">
    <section class="text-center my-5 py-5 container">
        <!-- Section heading -->
        @foreach($domains as $domain)
        <div class="row">
            <div class="col-12 d-lg-none bg-light-silver">
                <img src="{{ Voyager::image($domain->image) }}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-lg-7 mb-3 text bg-light-silver">
                <div class="d-flex flex-column h-100 justify-content-center text-left p-5">
                    <h1 class="py-2 mb-3 font-weight-bold border-bottom border-dark mt-auto">{{ $domain->title }}</h1>
                    <p class="mb-3 h5 text-left">{{ $domain->abstract }}</p>
                    <a href="{{route('web.researches.domains.detail', $domain->id)}}"
                        class="btn text-success ml-auto text-uppercase font-weight-bolder mt-auto"> Read More</a>
                </div>
            </div>
            <div class="d-none d-lg-flex col-lg-5 mb-3 background-size-cover background-position-center"
                style="background-image:url({{ Voyager::image($domain->image) }});">
            </div>
        </div>
        @endforeach
    </section>
</div>
@endsection