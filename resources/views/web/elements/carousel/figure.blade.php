@if(!empty($items))
@push('css')
<style>
    @media(max-width: 991.98px) {

        #carousel-figure .carousel-item.active,
        #carousel-figure .carousel-item-next,
        #carousel-figure .carousel-item-prev {
            display: flex !important;
        }

        #carousel-figure .carousel-inner {
            width: 80%;
        }

        #carousel-figure .carousel-item-next,
        #carousel-figure .carousel-item-right.active {
            transform: translateX(50%);
        }

        #carousel-figure .carousel-item-left.active,
        #carousel-figure .carousel-item-prev {
            transform: translateX(-50%);
        }

        #carousel-figure .carousel-item-left,
        #carousel-figure .carousel-item-right {
            transform: translateX(0);
        }

        #carousel-figure .carousel-control-prev,
        #carousel-figure .carousel-control-next {
            width: 10%;
            font-size: 2rem;
        }
    }

    @media(max-width: 767.98px) {

        #carousel-figure .carousel-item-next,
        #carousel-figure .carousel-item-right.active {
            transform: translateX(100%);
        }

        #carousel-figure .carousel-item-left.active,
        #carousel-figure .carousel-item-prev {
            transform: translateX(-100%);
        }

        #carousel-figure .carousel-item-left,
        #carousel-figure .carousel-item-right {
            transform: translateX(0);
        }
    }
</style>
@endpush

<div class="row d-lg-flex d-none">
    @foreach($items as $i=>$item)
    <div class="col-lg-3 mb-5">
        @figure(['item'=>$item, 'push'=>$i==0])@endfigure
    </div>
    @endforeach
</div>

<div id="carousel-figure" class="carousel slide d-lg-none d-block" data-ride="carousel">
    @if(count($items) > 4)
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-figure" role="button" data-slide="prev">
        <i class="fas fa-chevron-left text-dark font-weight-bold"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-figure" role="button" data-slide="next">
        <i class="fas fa-chevron-right text-dark font-weight-bold"></i>
        <span class="sr-only">Next</span>
    </a>
    @endif
    <!--/.Controls-->

    <!-- Indicators -->
    <ol class="carousel-indicators mb-n2">
        @for($i=0; $i<count($items); $i+=4)
        <li data-target="#carousel-figure" data-slide-to="{{$i}}" class="{{ $i==0?'active':''}} bg-green 
            rounded-circle w-2-vh vh-2"></li>
        @endfor
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner mx-auto" role="listbox">
        @for($i=0;$i<count($items);$i+=4) 
        <div class="carousel-item {{$i==0?'active':''}}">
            <div class="row">
                @for($j=$i;$j<count($items);$j++) 
                <div class="col-6 mb-5">
                    @figure(['item'=>$items[$j], 'push'=>$i==0])@endfigure
                </div>
                @endfor
            </div>
    </div>
    @endfor
</div>
</div>
@if(count($items)/4 > 1)
@push('js')
<script>
    $(document).ready(function() {
        var $items = $('#carousel-figure .carousel-item');
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