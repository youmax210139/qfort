@if(!empty($items))
@pushonce('css:carousel_domain')
<style>
    #carousel-domain .carousel-item.active{
        display: flex !important;
    }

    @media(max-width: 991.98px) {

        #carousel-domain .carousel-inner .carousel-item-next,
        #carousel-domain .carousel-inner .carousel-item-right.active {
            transform: translateX(100%);
        }

        #carousel-domain .carousel-inner .carousel-item-left.active,
        #carousel-domain .carousel-inner .carousel-item-prev {
            transform: translateX(-100%);
        }

        #carousel-domain .carousel-inner .carousel-item-left,
        #carousel-domain .carousel-inner .carousel-item-right {
            transform: translateX(0);
        }

    }
</style>
@endpushonce

<div class="row d-lg-none">
    @foreach($items as $item)
    @domain(['item'=>$item])
    @slot('className')
    col-lg-4
    @endslot
    @enddomain
    @endforeach
</div>

<div id="carousel-domain" class="carousel slide d-none d-lg-block" data-ride="carousel">

    <!-- Indicators -->
    @if(count($items)>3)
    <ol class="carousel-indicators mb-n2">
        @for($i=0; $i<count($items); $i+=3)
        <li data-target="#carousel-domain" data-slide-to="{{$i/3}}" class="{{ $i==0?'active':''}} bg-green
            rounded-circle w-2-vh vh-2"></li>
        @endfor
    </ol>
    @endif
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner mx-auto " role="listbox">
        @for($i=0; $i<count($items); $i+=3)
        <div class="carousel-item {{$i==0?'active':''}}">
            @for($j=$i; $j<count($items)&&$j<$i+3; $j++)
            @domain(['item'=>$items[$j]])
            @slot('className')

            @endslot
            @enddomain
            @endfor
        </div>
        @endfor
    </div>
</div>

@endif