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
</style>
@endpush
@section('content')
@carousel @endcarousel
<section class="text-center my-5 container news">

    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5">In the NEWS today</h2>
    @php
    $items= [1,2,3,4,5,6];
    @endphp
    {{-- <!-- Grid row -->
    <div class="row">
        @foreach ($items as $item)

        <!-- Grid column -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 text-left">
            <!-- Featured image -->
            <div class="mb-0">
                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/81.jpg" alt="Sample image">
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <div class="bg-secondary p-3">

                <!-- Post title -->
                <h4 class="font-weight-bold mb-3"><strong>How will nano technology change modern medicine?</strong></h4>
                <!-- Post data -->
                <p>June 10th, 2019 / <a class="text-success">The Latest News</a></p>
                <!-- Excerpt -->
                <p>Amazing new age technology that has unseen design elements with an incredible
                    use of technological design sense and imagery.</p>
                <!-- Read more button -->
                <div class="text-right"><a class="btn text-success font-weight-bold">Read more</a></div>
            </div>

        </div>
        <!-- Grid column -->
        @endforeach
    </div> --}}
    <!-- Grid row -->
    <div id="carousel-example-multi" class="carousel carousel-multi-item" data-ride="carousel">

        <!--Controls-->
        <div class="controls-top d-lg-none">
            <a class="btn-floating" href="#carousel-example-multi" data-slide="prev"><i
                    class="fas fa-chevron-left"></i></a>
            <a class="btn-floating" href="#carousel-example-multi" data-slide="next"><i
                    class="fas fa-chevron-right"></i></a>
        </div>
        <!--/.Controls-->

        <!-- Indicators -->
        <ol class="carousel-indicators d-lg-none">
            <li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-multi" data-slide-to="1"></li>
            <li data-target="#carousel-example-multi" data-slide-to="2"></li>
            <li data-target="#carousel-example-multi" data-slide-to="3"></li>
            <li data-target="#carousel-example-multi" data-slide-to="4"></li>
            <li data-target="#carousel-example-multi" data-slide-to="5"></li>
        </ol>
        <!--/.Indicators-->
        <div class="carousel-inner" role="listbox">
            @foreach( $items as $i => $v)
            <div class="carousel-item active col-md-6 col-lg-4 mr-lg-auto mb-3">
                <div class="text-left float-left">
                    <!-- Featured image -->
                    <div class="mb-0">
                        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/81.jpg"
                            alt="Sample image">
                    </div>
                    <div class="bg-secondary p-3">
                        <!-- Post title -->
                        <h4 class="font-weight-bold mb-3"><strong>How will nano technology change modern
                                medicine?</strong></h4>
                        <!-- Post data -->
                        <p>June 10th, 2019 / <a class="text-success">The Latest News</a></p>
                        <!-- Excerpt -->
                        <p>Amazing new age technology that has unseen design elements with an incredible
                            use of technological design sense and imagery.</p>
                        <!-- Read more button -->
                        <div class="text-right"><a class="btn text-success font-weight-bold">Read more</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <a class="btn btn-success btn-lg text-white px-5">More</a>
</section>


<section class="text-center my-5 container event">
    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold text-center my-5">Events</h2>
    <!-- Section description -->
    <p class="grey-text text-center w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur</p>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col mb-4 image" style="background-image:url({{ asset('storage/index/event2@2x.png')}})">
                    <div class></div>
                    {{-- <img class="img-fluid" src="{{ Voyager::image('index/event2@2x.png')}}"> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 image" style="background-image:url({{ asset('storage/index/event3@2x.png')}})">
                    <div class></div>
                    {{-- <img class="img-fluid" src="{{ Voyager::image('index/event3@2x.png')}}"> --}}
                </div>
                <div class="col-md-6 mb-4 image" style="background-image:url({{ asset('storage/index/event4@2x.png')}})">
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
        <div class="col-md-4 mb-4 image"
            style="background-image:url({{ asset('storage/index/event1@2x.png')}})">
            <div class='d-flex align-items-end'>
                <!-- Post title -->
                <h4 class="font-weight-bold mb-3"><strong>How will nano technology change modern
                        medicine?</strong></h4>
                <!-- Post data -->
                <p>June 10th, 2019 / <a class="text-success">The Latest News</a></p>
            </div>
        </div>

    </div>

</section>
@endsection