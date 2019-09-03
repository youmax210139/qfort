@if(!empty($items))
@push('css')
<style>

    #carousel-post .carousel-control-prev,
    #carousel-post .carousel-control-next {
        width: 10%;
        font-size: 2rem;
    }

    #carousel-post .carousel-item.active,
    #carousel-post .carousel-item-next,
    #carousel-post .carousel-item-prev {
        display: flex !important;
    }

    #carousel-post .carousel-inner {
        width: 80%;
    }


    @media(max-width: 991.98px) {

        #carousel-post .carousel-inner .carousel-item-next,
        #carousel-post .carousel-inner .carousel-item-right.active {
            transform: translateX(100%);
        }

        #carousel-post .carousel-inner .carousel-item-left.active,
        #carousel-post .carousel-inner .carousel-item-prev {
            transform: translateX(-100%);
        }

        #carousel-post .carousel-inner .carousel-item-left,
        #carousel-post .carousel-inner .carousel-item-right {
            transform: translateX(0);
        }
    }
</style>
@endpush

<div class="row d-lg-flex d-none">
    @foreach($items as $item)
    <div class="col-lg-{{ 12/$column_count}} mb-5">
        <div class="h-100 bg-silver d-flex flex-column px-3 pb-5 align-items-center">
            <div class="mb-0 view overlay zoom mx-n3 mb-3">
                <a href="{{ $item->link }}">
                    <img class="w-100 img-fluid  object-fit-cover" src="{{ Voyager::image($item->image) }}">
                    <div class="mask"></div>
                </a>
            </div>
            <h4 class="text-center font-weight-bold mb-3 ">
                {{ $item->title }}
            </h4>
            <div class="text-left">{!! $item->abstract !!}</div>
            <a class="mt-auto w-10-vh btn px-4 btn-success font-weight-bold border-radius-3x" href="{{ $item->link }}">
                More
            </a>
        </div>
    </div>
    @endforeach
</div>

<div id="carousel-post" class="carousel slide d-lg-none d-block" data-ride="carousel">
    @if(count($items) > 1)
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-post" role="button" data-slide="prev">
        <i class="fas fa-chevron-left text-dark font-weight-bold"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-post" role="button" data-slide="next">
        <i class="fas fa-chevron-right text-dark font-weight-bold"></i>
        <span class="sr-only">Next</span>
    </a>
    @endif
    <!--/.Controls-->

    <!-- Indicators -->
    <ol class="carousel-indicators mb-n2">
        @foreach($items as $i => $item)
        <li data-target="#carousel-post" data-slide-to="{{$i}}" class="{{ $i==0?'active':''}} bg-green 
            rounded-circle w-2-vh vh-2"></li>
        @endforeach
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner mx-auto" role="listbox">
        @foreach($items as $i=> $item)
        <div class="carousel-item {{$i==0?'active':''}}">
            <div class="col-12 mb-5">
                <div class="h-100 bg-silver d-flex flex-column px-3 pb-5 align-items-center">
                    <div class="mb-0 view overlay zoom mx-n3 mb-3">
                        <a href="{{ $item->link }}">
                            <img class="w-100 img-fluid  object-fit-cover" src="{{ Voyager::image($item->image) }}">
                            <div class="mask"></div>
                        </a>
                    </div>
                    <h4 class="text-center font-weight-bold mb-3 ">
                        {{ $item->title }}
                    </h4>
                    <div class="text-left">{!! $item->abstract !!}</div>
                    <a class="mt-auto w-10-vh btn px-4 btn-success font-weight-bold border-radius-3x"
                        href="{{ $item->link }}">
                        More
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@if(count($items) > 1)
@push('js')
<script>
    $(document).ready(function() {
        var $items = $('#carousel-post .carousel-item');
        $items.each(function(){
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i=0;i<$items.length-2;i++) {
                next=next.next();
                if (!next.length) {
                next=$(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });
    });
</script>
@endpush
@endif
@endif