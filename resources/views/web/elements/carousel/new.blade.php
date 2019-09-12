@if(!empty($items))
@pushonce('css:carouselnew')
<style>
    #carousel-new .carousel-control-prev,
    #carousel-new .carousel-control-next {
        width: 10%;
        font-size: 2rem;
    }

    #carousel-new .carousel-item.active,
    #carousel-new .carousel-item-next,
    #carousel-new .carousel-item-prev {
        display: flex !important;
    }

    #carousel-new .carousel-inner {
        width: 80%;
    }


    @media(max-width: 991.98px) {

        #carousel-new .carousel-inner .carousel-item-next,
        #carousel-new .carousel-inner .carousel-item-right.active {
            transform: translateX(100%);
        }

        #carousel-new .carousel-inner .carousel-item-left.active,
        #carousel-new .carousel-inner .carousel-item-prev {
            transform: translateX(-100%);
        }

        #carousel-new .carousel-inner .carousel-item-left,
        #carousel-new .carousel-inner .carousel-item-right {
            transform: translateX(0);
        }

    }
</style>
@endpushonce

<div class="row d-lg-flex d-none">
    @foreach($items as $item)
    @new(['item'=>$item])
    @slot('className')
    col-lg-4
    @endslot
    @endnew
    @endforeach
</div>

<div id="carousel-new" class="carousel slide d-lg-none d-block" data-ride="carousel">
    @if(count($items) > 1)
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-new" role="button" data-slide="prev">
        <i class="fas fa-chevron-left text-dark font-weight-bold"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-new" role="button" data-slide="next">
        <i class="fas fa-chevron-right text-dark font-weight-bold"></i>
        <span class="sr-only">Next</span>
    </a>
    @endif
    <!--/.Controls-->

    <!-- Indicators -->
    <ol class="carousel-indicators mb-n2">
        @foreach($items as $i => $item)
        <li data-target="#carousel-new" data-slide-to="{{$i}}" class="{{ $i==0?'active':''}} bg-green 
            rounded-circle w-2-vh vh-2"></li>
        @endforeach
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner mx-auto " role="listbox">
        @foreach($items as $i=> $item)
        <div class="carousel-item {{$i==0?'active':''}}">
            @new(['item'=>$item])
            @slot('className')

            @endslot
            @endnew
        </div>
        @endforeach
    </div>
</div>

@if(count($items) > 1)
@pushonce('js:carouselnew')
<script>
    $(document).ready(function() {
        var $items = $('#carousel-new .carousel-item');
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
@endpushonce
@endif
@endif