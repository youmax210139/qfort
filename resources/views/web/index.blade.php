@extends('web.base')

@push('css')
<style>
    #carousel-news .carousel-item .content {
        background-color: #F6F6F6 !important;
        min-height: 225px;
    }

    #carousel-news .carousel-item .content .position-absolute {
        left: 0;
        bottom: 0;
    }

    #carousel-news .carousel-inner .carousel-item .object {
        opacity: 0;
        animation-duration: 2s;
    }

    #carousel-news .carousel-indicators .active {
        opacity: 1;
    }

    #carousel-news .carousel-indicators li {
        opacity: 0.5;
        border-radius: 50%;
        height: 1rem;
        width: 1rem;
        max-width: 1rem;
        background-color: $green;
        margin-bottom: -1.88rem;
    }

    @media (min-width: 992px) {
        #carousel-news .carousel-item {
            transition: none;
        }
    }

    @media(max-width: 991.98px) {
        #carousel-news .carousel-inner .carousel-item .object.animated.fadeInUp {
            animation-name: none;
            animation-duration: 0s;
            animation-delay: 0s;
            opacity: 1;
        }

        #carousel-news .carousel-item.active,
        #carousel-news .carousel-item-next,
        #carousel-news .carousel-item-prev {
            display: flex !important;
        }

        #carousel-news .carousel-inner {
            width: 80%;
        }

        #carousel-news .carousel-inner .carousel-item-next,
        #carousel-news .carousel-inner .carousel-item-right.active {
            transform: translateX(50%);
        }

        #carousel-news .carousel-inner .carousel-item-left.active,
        #carousel-news .carousel-inner .carousel-item-prev {
            transform: translateX(-50%);
        }

        #carousel-news .carousel-inner .carousel-item-left,
        #carousel-news .carousel-inner .carousel-item-right {
            transform: translateX(0);
        }

        #carousel-news .carousel-control-prev,
        #carousel-news .carousel-control-next {
            width: 10%;
            font-size: 2rem;
        }
    }

    @media(max-width: 767.98px) {

        #carousel-news .carousel-inner .carousel-item-next,
        #carousel-news .carousel-inner .carousel-item-right.active {
            transform: translateX(100%);
        }

        #carousel-news .carousel-inner .carousel-item-left.active,
        #carousel-news .carousel-inner .carousel-item-prev {
            transform: translateX(-100%);
        }

        #carousel-news .carousel-inner .carousel-item-left,
        #carousel-news .carousel-inner .carousel-item-right {
            transform: translateX(0);
        }
    }

    .research .row div.h-100 {
        border-bottom-left-radius: 1.5em;
        border-bottom-right-radius: 1.5em;
        border-top-left-radius: 3em;
        border-top-right-radius: 3em;
        background-color: #BDBEBF
    }

    .domain h4 {
        background-color: #474645;
        border-top-left-radius: 1.5em;
        border-top-right-radius: 1.5em;
    }

    .domain h4:hover {
        background-color: #217D7B;
    }
</style>
@endpush

@section('content')
@carousel([
'items' => $carousels
])
@endcarousel
<section class="text-center my-5 container px-0 news">

    <!-- Section heading -->
    <h2 class="text-center my-5 font-italic">In the <b>NEWS</b> today</h2>

    @carouselnew(['items'=>$articles])@endcarouselnew
</section>

<section class="text-center my-5 py-5 container research">
    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5 font-italic">Research</h2>
    <!-- Section description -->
    <h4 class="text-center font-weight-light mb-5">Amazing new age technology that has unseen design elements with an
        incredible use of technological design sense and imagery. Amazing new age technology that has unseen design
        elements with an incredible use of technological design sense and imagery.</h4>
    <div class="row domain">
        @foreach ($domains as $domain)
        <div class="col-12 col-lg-4 text-white mb-5 text-white">
            <div class="h-100">
                <h4 class="p-4 mb-0">
                    <a class="text-white"
                        href="{{ route('web.researches.domains.detail', $domain->id) }}">{{ $domain->title }}
                    </a>
                </h4>
                <p class="h5 p-4 mb-0">{{ $domain->abstract }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <a class="btn btn-success btn-lg text-white px-5 mt-4 d-inline-block d-lg-none"
        href="{{ route('web.researches.index')}}">More</a>
</section>
<section class="text-center my-5 container event">
    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5 font-italic">Events</h2>
    <!-- Section description -->
    <h4 class="text-center mb-5 font-weight-light">Fascinating insights into the world of optics</h4>
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-12 mb-2 p-2 mb-md-0">
                    @eventHeader(['item'=>$events[0]]) @endeventHeader
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 mb-2 p-2">
                    @eventHeader(['item'=>$events[2],'push'=>false ]) @endeventHeader
                </div>
                <div class="col-12 col-lg-6 mb-2 p-2">
                    @eventHeader(['item'=>$events[3],'push'=>false ]) @endeventHeader
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2 p-2">
            @eventHeader(['item'=>$events[1],'push'=>false, 'imgClass'=>'h-lg-100' ]) 
            @slot('style')
            height: 100% !important;
            @endslot
            @endeventHeader
        </div>

    </div>
    <a class="btn btn-success btn-lg text-white px-5 mt-4 d-none d-lg-inline-block"
        href="{{ route('web.events.index')}}">More</a>
</section>
@endsection
@push('js')
<script>
    $(document).ready(function() {

        var fadeIn = function(){
            var bottom_of_window = $(window).scrollTop() + $(window).innerHeight();
            $('#carousel-news .carousel-inner .carousel-item .object').each(function(){
                if( $(this).hasClass('animated')){
                    return;
                }
                var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                /* If the object is completely visible in the window, fade it it */
                if( bottom_of_window > bottom_of_object ){
                    $(this).addClass('animated fadeInUp');
                }
            }); 
        };

        setInterval(function(){
            fadeIn();
            $('#carousel-news').carousel('pause');
        }, 1000);

    });
</script>
@endpush