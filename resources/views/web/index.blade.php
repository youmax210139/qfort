@extends('web.base')

@push('css')
<style>
    #carousel-news .carousel-item .content {
        background-color: #F6F6F6 !important;
    }

    #carousel-news .carousel-inner {
        opacity: 0;
        animation-duration: 2s;
        animation-delay: 0s;
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

    .research .row p {
        border-bottom-left-radius: 1.5em;
        border-bottom-right-radius: 1.5em;
    }

    .research .row h4 {
        border-top-left-radius: 1.5em;
        border-top-right-radius: 1.5em;
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
        <div class="carousel-inner mx-auto " role="listbox">
            @foreach( $articles as $i => $article)
            <div class="carousel-item {{$i==0?'active':''}} {{ $i }}">
                <div class="text-left col-12 col-md-6 col-lg-4 mb-3 float-left px-2">
                    <div class="zoom view overlay mb-0">
                        <img class="img-fluid" src="{{ Voyager::image($article->image) }}">
                        <div class="mask"></div>
                    </div>
                    <div class="p-3 content h-100">
                        <h4 class="font-weight-bold mb-3">
                            {{ $article->title }}
                        </h4>
                        <p> {{ $article->created_at }} / <span class="text-success">The Latest News</span></p>
                        <p>{!! $article->abstract !!}</p>
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

<section class="text-center my-5 py-5 container research">
    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5 font-italic">Research</h2>
    <!-- Section description -->
    <h4 class="text-center font-weight-light mb-5">Amazing new age technology that has unseen design elements with an
        incredible use of technological design sense and imagery. Amazing new age technology that has unseen design
        elements with an incredible use of technological design sense and imagery.</h4>
    <div class="row">
        <div class="col-12 col-md-4 text-white mb-2">
            <h4 class="mt-2 p-4 bg-secondary mb-0">Quantum Device & Computing</h4>
            <p class="h5 bg-grey p-4 mb-0">Amazing new age technology that has unseen design elements with an incredible
                use of
                technological design sense and imagery.</p>
        </div>
        <div class="col-12 col-md-4 text-white mb-2">
            <h4 class="mt-2 p-4 bg-secondary mb-0">Quantum Device & Computing</h4>
            <p class="h5 bg-grey p-4 mb-0">Amazing new age technology that has unseen design elements with an incredible
                use of
                technological design sense and imagery.</p>
        </div>
        <div class="col-12 col-md-4 text-white mb-2">
            <h4 class="mt-2 p-4 bg-secondary mb-0">Quantum Device & Computing</h4>
            <p class="h5 bg-grey p-4 mb-0">Amazing new age technology that has unseen design elements with an incredible
                use of
                technological design sense and imagery.</p>
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
                <div class="col mb-2 p-2 mb-md-0">
                    @eventHeader(['item'=>$events[0]]) @endeventHeader
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2 p-2">
                    @eventHeader(['item'=>$events[2],'push'=>false ]) @endeventHeader
                </div>
                <div class="col-md-6 mb-2 p-2">
                    @eventHeader(['item'=>$events[3],'push'=>false ]) @endeventHeader
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2 p-2">
            @eventHeader(['item'=>$events[1],'push'=>false, 'imgClass'=>'h-md-100' ]) @endeventHeader
        </div>

    </div>
    <a class="btn btn-success btn-lg text-white px-5 mt-4 d-none d-lg-inline-block">More</a>
</section>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        var $items = $('#carousel-news .carousel-item');
        $items.each(function(){
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

        var fadeIn = function(){
            var $fadeitem = $('#carousel-news .carousel-inner'); 
            if( $fadeitem.hasClass('animated fadeInUp')){
                return;
            }
            var top_of_object = $fadeitem.position().top + 80;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > top_of_object ){
                $fadeitem.addClass('animated fadeInUp');
                setTimeout(function(){checkCarousel();}, 2500);
            }
        };
        var checkCarousel = function(){
            var $carousel = $('#carousel-news');
            if($(window).width() >= 922){
                $carousel.carousel('pause');
                // console.log("pause");
            }
            else{
                $carousel.carousel({
                    interval: 3000
                });
            }
        };
        fadeIn();
        $(window).resize( function(){
            checkCarousel();
        });
        $(window).scroll( function(){
            fadeIn();
        });
    });
</script>
@endpush