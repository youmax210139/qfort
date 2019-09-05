@push('css')
<style>
    #banner-vertical .carousel-caption {
        bottom: 0;
        position: static;
        padding: 100px 10px;
    }

    #banner .image {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    #banner .text {
        padding-left: 15%;
    }


    #banner-vertical .btn {
        background-color: #535251;
    }

    #banner-vertical .carousel-caption .btn:hover {
        background-color: #217D7B;
    }

    #banner-vertical .fas {
        font-size: 3rem;
    }

    #banner-vertical video {
        object-fit: cover;
        position: absolute;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: 100%;
        height: auto;
        z-index: 0;
        -ms-transform: translateX(-50%) translateY(-50%);
        -moz-transform: translateX(-50%) translateY(-50%);

        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
    }

    #banner-vertical .carousel-item {
        height: calc(100vh - 148px);
    }

    #banner-vertical .mask {
        background-color: rgba(189, 190, 191, 0.7) !important;
        z-index: 100;
    }

    @media (min-width: 992px) {
        #banner-vertical .carousel-item {
            height: calc(100vh - 123px);
        }
        @if(count($items) > 1)
        #banner-vertical .carousel-item .d-lg-flex {
            padding-left: 14% !important;
            padding-right: 4% !important;
        }
        @else
        #banner-vertical .carousel-item .d-lg-flex {
            padding-left: 10% !important;
            padding-right: 10% !important;
        }
        @endif
    }
</style>
@endpush
<!--Carousel Wrapper--  -->
<div id="banner-vertical" class="carousel slide" data-ride="carousel">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        @foreach ($items as $i => $item)
        <div class="carousel-item {{ $i==0?'active':'' }}">
            <div class="row mx-0 h-100">
                <div class="d-none d-lg-flex col-lg-5 bg-dark-silver">
                    <div class="carousel-caption d-flex flex-column h-100 
                align-items-center justify-content-center align-items-lg-start text-lg-left text-center mx-auto">
                        <h1 class="fa-3x font-weight-bold font-italic mb-4">{{ $item->title }}</h1>
                        <h2 class="mb-4">{{ $item->caption }}</h2>
                        <a class="btn btn-lg btn-gray rounded-0 px-4 py-1 mb-4" target="_blank"
                            href="{{ $item->link }}">Discover</a>
                    </div>
                </div>
                @if( preg_match('/^.*\.(mp4)$/i',$item->source) )
                <div class="col-12 col-lg-7 background-position-center background-size-cover object-fit-cover
                    d-flex justify-content-center">
                    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                        <source src="{{ Voyager::image($item->source) }}" type="video/mp4">
                    </video>
                    <div class="w-70 d-lg-none bg-dark-silver d-flex flex-column mask mb-4 mt-auto p-4 text-white">
                        <h1 class="font-weight-bold font-italic mb-1">{{ $item->title }}</h1>
                        <h3 class="mb-3">{{ $item->caption }}</h3>
                        <div class="text-center">
                            <a class="btn btn-lg btn-gray rounded-0 px-4 py-1 mb-4" target="_blank"
                                href="{{ $item->link }}">Find out More</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-12 col-lg-7 background-position-center background-size-cover object-fit-cover 
                    d-flex justify-content-center" style="background-image:url({{ Voyager::image($item->source) }});">
                    <div class="w-70 d-lg-none bg-dark-silver d-flex flex-column mask mb-4 mt-auto p-4 text-white">
                        <h1 class="font-weight-bold font-italic mb-1">{{ $item->title }}</h1>
                        <h3 class="mb-3">{{ $item->caption }}</h3>
                        <div class="text-center">
                            <a class="btn btn-lg btn-gray rounded-0 px-4 py-1 mb-4" target="_blank"
                                href="{{ $item->link }}">Find out More</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <!--/.Slides-->
    @if(count($items) > 1)
    <!--Controls-->
    <a class="carousel-control-prev w-lg-10" href="#banner-vertical" role="button" data-slide="prev">
        <i class="fas fa-chevron-left"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next w-lg-10" href="#banner-vertical" role="button" data-slide="next">
        <i class="fas fa-chevron-right"></i>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
    @endif
</div>