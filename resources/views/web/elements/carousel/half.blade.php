@push('css')
<style>
    #banner .carousel-caption {
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

    #banner .carousel-item {
        background-color: #BDBEBF;
    }

    #banner .btn {
        background-color: #535251;
    }

    #banner .carousel-caption .btn:hover {
        background-color: #217D7B;
    }

    #banner .fas {
        font-size: 3rem;
    }
</style>
@endpush
<!--Carousel Wrapper--  -->
<div id="banner" class="carousel slide" data-ride="carousel">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        @foreach ($items as $i => $item)
        <div class="carousel-item {{ $i==0?'active':'' }}">
            <div class="row mx-0">
                <div class="col-6 text">
                    <div class=" carousel-caption d-flex flex-column h-100 
                align-items-center justify-content-center align-items-lg-start text-lg-left text-center mx-auto">
                        <h2 class="font-weight-bold font-italic mb-4">When technology helps us see the world through
                            different
                            eyes.</h2>
                        <h4 class="mb-4">This is the moment we work for.</h4>
                        <a class="btn btn-lg rounded-0 px-4 py-1 mb-4">Discover</a>
                    </div>
                </div>
                <div class="col-6 image" style="background-image:url({{ $item }});"></div>
            </div>
        </div>
        @endforeach
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
        <i class="fas fa-chevron-left"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
        <i class="fas fa-chevron-right"></i>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>