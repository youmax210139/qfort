@push('css')
<style>
    .carousel-caption {
        top: 30%;
    }
</style>
@endpush
<!--Carousel Wrapper--  -->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    @php
    $items = [
    "https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg",
    "https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg",
    "https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg"
    ];
    @endphp
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        @foreach ($items as $i => $item)
        <div class="carousel-item {{ $i==0?'active':'' }}">
            <img class="d-block w-100" src="{{ $item }}">
            <div class="carousel-caption text-lg-left">
                <h3>Light mask</h3>
                <p>First text</p>
                <a class="btn btn-primary">Discover</a>
            </div>
        </div>
        @endforeach
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>