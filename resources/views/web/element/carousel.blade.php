@push('css')
<style>
    #{{$id}} .carousel-caption {
        bottom: 0;
        position: static;
        width: 70%;
        padding: 100px 10px;
    }
    #{{$id}} .carousel-caption .btn{
        background: #A6A7A7;
    }      
    #{{$id}} i {
        font-size: {{ $arrow_size??'3rem' }};
    }
    #{{$id}} .carousel-item{
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>
@endpush
<!--Carousel Wrapper--  -->
<div id="{{$id}}" class="carousel slide" data-ride="carousel">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        @foreach ($items as $i => $item)
        <div class="carousel-item {{ $i==0?'active':'' }}" style="background-image:url({{ $item }});">
            {{-- <img class="d-block w-100" src="{{ $item }}"> --}}
            <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center align-items-lg-start text-lg-left text-center mx-auto">
                <h2 class="font-weight-bold font-italic mb-4">When technology helps us see the world through different eyes.</h2>
                <h4 class="mb-4">This is the moment we work for.</h4>
                <a class="btn btn-lg rounded-0 px-4 py-1 mb-4">Discover</a>
            </div>
        </div>
        @endforeach
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#{{$id}}" role="button" data-slide="prev">
        <i class="fas fa-chevron-left"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#{{$id}}" role="button" data-slide="next">
        <i class="fas fa-chevron-right"></i>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>