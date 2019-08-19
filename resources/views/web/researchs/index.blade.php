@extends('web.base')

@push('css')
<style>
    .roadmap {
        background-color: #BDBEBF;
        color: #fff;
    }
    .area .text{
        min-height: 400px;
        background-color: #EBEBEB;
    }
    .area .image{
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container focus">
    <!-- Section heading -->
    <h2 class="font-weight-bold my-5 text-left mb-5">Our Focus</h2>
    <h4 class="text-left mb-5">Sub-title</h4>
    <p class="mb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
        it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
        including versions of Lorem Ipsum
    </p>
</section>
<section class="text-center my-5 roadmap">
    <div class="container">
        <!-- Section heading -->
        <div class="row">
            <div class="col-6">
                <img src="{{ Voyager::image('researchs/research1@2x.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-6">
                <div class="d-flex flex-column h-100 justify-content-center text-left">
                    <h2 class="mb-3">Our R&D Roadmap</h2>
                    <p class="mb-3"> QFort has a six-year R&D roadmap to conduct world - leading research. Key
                        milestones are planned for each focus area. All these will be integrated to innovate
                        groundbreaking
                        quantum technology and to make a better society.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="text-center my-5 container area">
    <p class="mb-2">
        QFort takes an interdisciplinary approach to make discoveries and to bring up the most advanced research
        outcomes. Our team includes researchers from diverse research areas. In addition, we has built up an
        international research platform to connect with partners or consultants around the world. This cooperation leads
        to continuous effort to deal with the most challenging scientific issues.
    </p>
    @php
    $items = [
    Voyager::image('researchs/research1@2x.png'),
    Voyager::image('researchs/research2@2x.png'),
    Voyager::image('researchs/research3@2x.png'),
    ];
    @endphp
    <!-- Section heading -->
    @foreach($items as $item)
    <div class="row">
        <div class="col-7 mb-3 text">
            <div class="d-flex flex-column h-100 justify-content-center text-left">
                <h2 class="mb-3 border-bottom">Quantum Materials</h2>
                <p class="mb-3"> Our goal is to investigate the theory of quantum foundation such that it can be used in
                    our CMOS compatible superconductor/semiconductor quantum devices or IBM-Q in the cloud.</p>
                <a href="/researchs/1" class="btn text-success ml-auto text-uppercase"> Read More</a>
            </div>
        </div>
        <div class="col-5 mb-3 image" style="background-image:url({{ $item }});">
        </div>
    </div>
    @endforeach
</section>
@endsection