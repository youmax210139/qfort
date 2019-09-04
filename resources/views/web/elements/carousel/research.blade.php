@if(!empty($items))
@push('css')
<style>
    #carousel-research .carousel-control-prev,
    #carousel-research .carousel-control-next {
        width: 10%;
        font-size: 2rem;
    }

    #carousel-research .carousel-item.active,
    #carousel-research .carousel-item-next,
    #carousel-research .carousel-item-prev {
        display: flex !important;
    }

    #carousel-research .carousel-inner {
        width: 80%;
    }


    @media(max-width: 991.98px) {

        #carousel-research .carousel-inner .carousel-item-next,
        #carousel-research .carousel-inner .carousel-item-right.active {
            transform: translateX(100%);
        }

        #carousel-research .carousel-inner .carousel-item-left.active,
        #carousel-research .carousel-inner .carousel-item-prev {
            transform: translateX(-100%);
        }

        #carousel-research .carousel-inner .carousel-item-left,
        #carousel-research .carousel-inner .carousel-item-right {
            transform: translateX(0);
        }
    }
</style>
@endpush

<div class="row d-lg-flex d-none">
    @foreach($items as $item)
    @research(['item'=>$item])
    @slot('className')
    @switch($column_count)
    @case(2):
        col-lg-6
        @break
    @case(4):
        col-lg-3
        @break
    @endswitch
    @endslot
    @endresearch
    @endforeach

</div>

<div id="carousel-research" class="carousel slide d-lg-none d-block" data-ride="carousel">
    @if(count($items) > 1)
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-research" role="button" data-slide="prev">
        <i class="fas fa-chevron-left text-dark font-weight-bold"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-research" role="button" data-slide="next">
        <i class="fas fa-chevron-right text-dark font-weight-bold"></i>
        <span class="sr-only">Next</span>
    </a>
    @endif
    <!--/.Controls-->

    <!-- Indicators -->
    <ol class="carousel-indicators mb-n2">
        @foreach($items as $i => $item)
        <li data-target="#carousel-research" data-slide-to="{{$i}}" class="{{ $i==0?'active':''}} bg-green 
            rounded-circle w-2-vh vh-2"></li>
        @endforeach
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner mx-auto" role="listbox">
        @foreach($items as $i=> $item)
        <div class="carousel-item {{$i==0?'active':''}}">
            @research(['item'=>$item, 'mobile'=>true])
            @slot('className')

            @endslot
            @endresearch
        </div>
        @endforeach
    </div>
</div>
@if(count($items) > 1)
@push('js')
<script>
    $(document).ready(function() {
        var $items = $('#carousel-research .carousel-item');
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