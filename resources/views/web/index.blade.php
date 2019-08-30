@extends('web.base')

@push('css')
<style>
    #carousel-news .carousel-item .content {
        background-color: #F6F6F6 !important;
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
                    <div class="p-3 content">
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