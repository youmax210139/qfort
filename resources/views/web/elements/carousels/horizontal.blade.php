@pushonce('css:carousel_horizontal')
<style>
    #banner-horizontal .carousel-caption {
        bottom: 0;
        width: 70%;
        padding: 0;
    }

    #banner-horizontal .fas {
        font-size: 3rem;
    }

    #banner-horizontal .carousel-item {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    #banner-horizontal video {
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
@endpushonce
<div id="banner-horizontal" class="carousel slide" data-ride="carousel">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        @foreach ($items as $i => $item)
        @if( preg_match('/^.*\.(mp4)$/i',$item->source) )
        <div class="carousel-item p-0 {{ $i==0?'active':'' }} bg-black">
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="{{ Voyager::image($item->source) }}" type="video/mp4">
            </video>
            @else
            <div class="carousel-item p-0 {{ $i==0?'active':'' }}"
                style="background:url({{ Voyager::image($item->source) }}) black no-repeat center center scroll;">
                @endif
                <div
                    class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center align-items-lg-start text-lg-left text-center mx-auto">
                    <h1 class="fa-3x font-weight-bold font-italic mb-4">{{ $item->title }}</h1>
                    <h2 class="mb-4">{{ $item->caption }}</h2>
                    @isset($item->link)
                    <a class="btn btn-dark-silver btn-lg rounded-0 px-4 py-1" href="{{ $item->link}}"
                        target="_blank">Discover</a>
                    @endisset
                </div>
            </div>
            @endforeach
        </div>
        @if(count($items) > 1)
        <a class="carousel-control-prev" href="#banner-horizontal" role="button" data-slide="prev">
            <i class="fas fa-chevron-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#banner-horizontal" role="button" data-slide="next">
            <i class="fas fa-chevron-right"></i>
            <span class="sr-only">Next</span>
        </a>
        @endif
    </div>
</div>
