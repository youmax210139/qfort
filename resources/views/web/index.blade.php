@extends('web.layout')

@push('css')
<style>
    .event .row .image {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-origin: content-box;
        min-height: 200px;
        background-clip: content-box;
    }

    #carousel-news .carousel-indicators .active {
        opacity: 1;
    }

    #carousel-news .carousel-indicators li {
        opacity: .5;
        border-radius: 50%;
        height: 1rem;
        width: 1rem;
        max-width: 1rem;
        background-color: #217D7B;
        margin-bottom: -1.88rem;
    }

    @media (max-width: 991.98px) {

        #carousel-news .carousel-item.active,
        #carousel-news .carousel-item-next,
        #carousel-news .carousel-item-prev {
            display: flex !important;
        }

        #carousel-news .carousel-inner .carousel-item-next,
        #carousel-news .carousel-inner .carousel-item-right.active {
            transform: translateX(50%)
        }

        #carousel-news .carousel-inner .carousel-item-left.active,
        #carousel-news .carousel-inner .carousel-item-prev {
            transform: translateX(-50%)
        }

        #carousel-news .carousel-inner .carousel-item-left,
        #carousel-news .carousel-inner .carousel-item-right {
            transform: translateX(0)
        }

        #carousel-news .carousel-inner {
            width: 80%;
        }

        #carousel-news .carousel-control-prev,
        #carousel-news .carousel-control-next {
            width: 10%;
            font-size: 2rem;
        }
    }

    @media (max-width: 767.98px) {

        #carousel-news .carousel-inner .carousel-item-next,
        #carousel-news .carousel-inner .carousel-item-right.active {
            transform: translateX(100%)
        }

        #carousel-news .carousel-inner .carousel-item-left.active,
        #carousel-news .carousel-inner .carousel-item-prev {
            transform: translateX(-100%)
        }

        #carousel-news .carousel-inner .carousel-item-left,
        #carousel-news .carousel-inner .carousel-item-right {
            transform: translateX(0)
        }

    }

    @media (min-width: 992px) {
        #carousel-news .carousel-item {
            transition: none;
        }
    }
</style>
@endpush
@php
$items = [
Voyager::image('carousel/carousel1@2x.png'),
Voyager::image('carousel/carousel2@2x.png'),
];
@endphp
@section('content')
@carousel([
    'items' => $items
])
@endcarousel
<section class="text-center my-5 container px-0 news">

    <!-- Section heading -->
    <h2 class="text-center my-5 font-italic">In the <b>NEWS</b> today</h2>
    @php
    $items= [
    Voyager::image('index/event4@2x.png'),
    Voyager::image('index/event4@2x.png'),
    Voyager::image('index/event4@2x.png'),
    Voyager::image('index/event4@2x.png'),
    Voyager::image('index/event4@2x.png'),
    Voyager::image('index/event4@2x.png')
    ];
    @endphp
    <!-- Grid row -->
    <div id="carousel-news" class="carousel slide mx-sm-n1 mx-lg-0" data-ride="carousel">

        <!--Controls-->
        <a class="carousel-control-prev d-lg-none" href="#carousel-news" role="button" data-slide="prev">
            <i class="fas fa-chevron-left text-dark font-weight-bold"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next d-lg-none" href="#carousel-news" role="button" data-slide="next">
            <i class="fas fa-chevron-right text-dark font-weight-bold"></i>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->

        <!-- Indicators -->
        <ol class="carousel-indicators d-lg-none mb-n2">
            <li data-target="#carousel-news" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-news" data-slide-to="1"></li>
            <li data-target="#carousel-news" data-slide-to="2"></li>
            <li data-target="#carousel-news" data-slide-to="3"></li>
            <li data-target="#carousel-news" data-slide-to="4"></li>
            <li data-target="#carousel-news" data-slide-to="5"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner mx-auto" role="listbox">
            @foreach( $items as $i => $item)
            <div class="carousel-item {{$i==0?'active':''}}">
                <div class="text-left col-12 col-md-6 col-lg-4 mb-3 float-left px-2">
                    <!-- Featured image -->
                    <div class="mb-0">
                        <img class="img-fluid" src="{{ $item }}" alt="Sample image">
                    </div>
                    <div class="bg-secondary p-3">
                        <!-- Post title -->
                        <h4 class="font-weight-bold mb-3">
                            <strong>
                                How will nano technology change modern
                                medicine?
                            </strong>
                        </h4>
                        <!-- Post data -->
                        <p>June {{$i}}th, 2019 / <a class="text-success">The Latest News</a></p>
                        <!-- Excerpt -->
                        <p>Amazing new age technology that has unseen design elements with an incredible
                            use of technological design sense and imagery.</p>
                        <!-- Read more button -->
                        <div class="text-right">
                            <a class="btn text-success font-weight-bold">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--/.Slides-->
    </div>
    <a class="btn btn-success btn-lg text-white px-5 mt-4 d-none d-lg-inline-block">More</a>
</section>

<section class="text-center my-5 container research">
    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5 font-italic">Research</h2>
    <!-- Section description -->
    <h4 class="text-center font-weight-light mb-5">Amazing new age technology that has unseen design elements with an
        incredible use of technological design sense and imagery. Amazing new age technology that has unseen design
        elements with an incredible use of technological design sense and imagery.</h4>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col mb-4 image" style="background-image:url({{ asset('storage/index/event2@2x.png')}})">
                    <div class></div>
                    {{-- <img class="img-fluid" src="{{ Voyager::image('index/event2@2x.png')}}"> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 image"
                    style="background-image:url({{ asset('storage/index/event3@2x.png')}})">
                    <div class></div>
                    {{-- <img class="img-fluid" src="{{ Voyager::image('index/event3@2x.png')}}"> --}}
                </div>
                <div class="col-md-6 mb-4 image"
                    style="background-image:url({{ asset('storage/index/event4@2x.png')}})">
                    <div class>
                        <!-- Post title -->
                        <h4 class="font-weight-bold mb-3"><strong>How will nano technology change modern
                                medicine?</strong></h4>
                        <!-- Post data -->
                        <p>June 10th, 2019 / <a class="text-success">The Latest News</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4 image" style="background-image:url({{ asset('storage/index/event1@2x.png')}})">
            <div class='d-flex align-items-end'>
                <!-- Post title -->
                <h4 class="font-weight-bold mb-3"><strong>How will nano technology change modern
                        medicine?</strong></h4>
                <!-- Post data -->
                <p>June 10th, 2019 / <a class="text-success">The Latest News</a></p>
            </div>
        </div>

    </div>
    <a class="btn btn-success btn-lg text-white px-5 mt-4 d-inline-block d-lg-none">More</a>
</section>

<section class="text-center my-5 container event">
    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5 font-italic">Events</h2>
    <!-- Section description -->
    <h4 class="text-center mb-5 font-weight-light">Fascinating insights into the world of optics</h4>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col mb-2 p-2 mb-md-0 image"
                    style="background-image:url({{ asset('storage/index/event2@2x.png')}})">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2 p-2 image"
                    style="background-image:url({{ asset('storage/index/event3@2x.png')}})">
                </div>
                <div class="col-md-6 mb-2 p-2 image"
                    style="background-image:url({{ asset('storage/index/event4@2x.png')}})">
                    <div class>
                        <!-- Post title -->
                        <h4 class="font-weight-bold mb-3"><strong>How will nano technology change modern
                                medicine?</strong></h4>
                        <!-- Post data -->
                        <p>June 10th, 2019 / <a class="text-success">The Latest News</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2 p-2 image" style="background-image:url({{ asset('storage/index/event1@2x.png')}})">
            <div class='d-flex align-items-end'>
                <!-- Post title -->
                <h4 class="font-weight-bold mb-3"><strong>How will nano technology change modern
                        medicine?</strong></h4>
                <!-- Post data -->
                <p>June 10th, 2019 / <a class="text-success">The Latest News</a></p>
            </div>
        </div>

    </div>
    <a class="btn btn-success btn-lg text-white px-5 mt-4 d-none d-lg-inline-block">More</a>
</section>
@endsection
@push('js')
<script>
    $('#carousel-news .carousel-item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i=0;i<4;i++) {
            next=next.next();
            if (!next.length) {
            next=$(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
        }
    });
</script>
@endpush