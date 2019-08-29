<!--Carousel Wrapper--  -->
@php
$type = $type??'';
@endphp
@if(\View::exists('web.elements.carousel.'.$type))
@include('web.elements.carousel.'.$type, ['items'=>$items])
@else
@push('css')
<style>
    #banner .carousel-caption {
        bottom: 0;
        width: 70%;
        padding: 0;
    }

    #banner .carousel-caption .btn {
        background-color: #535251;
    }

    #banner .carousel-caption .btn:hover {
        background-color: #217D7B;
    }

    #banner .fas {
        font-size: 3rem;
    }

    #banner .carousel-item {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        min-height: 90vh;
    }

    #banner video {
        position: absolute;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: 0;
        -ms-transform: translateX(-50%) translateY(-50%);
        -moz-transform: translateX(-50%) translateY(-50%);
        
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
    }
</style>
@endpush
<div id="banner" class="carousel slide" data-ride="carousel">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        @foreach ($items as $i => $item)
        <div class="carousel-item p-0 {{ $i==0?'active':'' }}""
            style=" background:url({{ Voyager::image($item->source) }}) black no-repeat center center scroll;">
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="{{ Voyager::image($item->source) }}" type="video/mp4">
            </video>
            <div
                class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center align-items-lg-start text-lg-left text-center mx-auto">
                <h1 class="font-weight-bold font-italic mb-4">{{ $item->title }}</h1>
                <h3 class="mb-4">{{ $item->caption }}</h3>
                @isset($item->link)
                <a class="btn btn-lg rounded-0 px-4 py-1 mb-4 text-white" href="{{ $item->link}}">Discover</a>
                @endisset
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
        <i class="fas fa-chevron-left"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
        <i class="fas fa-chevron-right"></i>
        <span class="sr-only">Next</span>
    </a>
</div>
@endif