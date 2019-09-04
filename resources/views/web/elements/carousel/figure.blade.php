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

        #carousel-figure .carousel-control-prev,
        #carousel-figure .carousel-control-next {
            width: 10%;
            font-size: 2rem;
        }
    }
</style>
@endpush

<div class="row d-lg-flex d-none">
    @foreach($items as $i=>$item)
    @figure(['item'=>$item, 'push'=>$i==0])@endfigure
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
        @for($i=0; $i<count($items); $i+=4) <li data-target="#carousel-figure" data-slide-to="{{$i/4}}" class="{{ $i==0?'active':''}} bg-green 
            rounded-circle w-2-vh vh-2">
            </li>
            @endfor
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner mx-auto" role="listbox">
        @for($i=0;$i<count($items);$i+=4) 
        <div class="carousel-item {{$i==0?'active':''}}">
            <div class="col-12">
                <div class="row">
                    @if(count($items)> $i)
                    @figure(['item'=>$items[$i], 'push'=>$i==0])@endfigure
                    @endif
                    @if(count($items)> $i+1)
                    @figure(['item'=>$items[$i+1], 'push'=>$i+1==0])@endfigure
                    @endif
                </div>
                <div class="row">
                    @if(count($items)> $i+2)
                    @figure(['item'=>$items[$i+2], 'push'=>$i+2==0])@endfigure
                    @endif
                    @if(count($items)> $i+3)
                    @figure(['item'=>$items[$i+3], 'push'=>$i+3==0])@endfigure
                    @endif
                </div>
            </div>
        </div>
        @endfor
    </div>

</div>

@if(count($items)/4 > 1)
@push('js')
@endpush
@endif
@endif