@extends('web.base')

@push('css')
<style>

</style>
@endpush

@section('content')
@carouselhorizontal(['items' => $carousels])@endcarouselhorizontal
<section class="text-center my-5 container px-0 news">

    <!-- Section heading -->
    <h2 class="text-center my-5 font-italic">{!! setting('index.news_title') !!}</h2>

    @carouselnew(['items'=>$articles])@endcarouselnew
</section>

<section class="text-center my-5 container research">
    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5 font-italic">{!! setting('index.researches_title') !!}</h2>
    <!-- Section description -->
    <h4 class="text-center font-weight-light mb-5">{!! setting('index.researches_subtitle') !!}</h4>
    @carouseldomain(['items'=>$domains])@endcarouseldomain
    <a class="btn btn-success btn-lg text-white px-5 mt-4 d-inline-block d-lg-none"
        href="{{ route('web.researches.index')}}">More</a>
</section>
<section class="text-center my-5 container event">
    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5 font-italic">{!! setting('index.events_title') !!}</h2>
    <!-- Section description -->
    <h4 class="text-center mb-5 font-weight-light">{!! setting('index.events_subtitle') !!}</h4>
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-12 mb-2 p-2 mb-md-0">
                    @isset($events[0])
                    @eventHeader(['item'=>$events[0]]) @endeventHeader
                    @endisset
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 mb-2 p-2">
                    @isset($events[2])
                    @eventHeader(['item'=>$events[2],'push'=>false ]) @endeventHeader
                    @endisset
                </div>
                <div class="col-12 col-lg-6 mb-2 p-2">
                    @isset($events[3])
                    @eventHeader(['item'=>$events[3],'push'=>false ]) @endeventHeader
                    @endisset
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2 p-2">
            @isset($events[1])
            @eventHeader(['item'=>$events[1],'push'=>false, 'imgClass'=>'h-lg-100' ]) 
            @slot('style')
            height: 100% !important;
            @endslot
            @endeventHeader
            @endisset
        </div>

    </div>
    <a class="btn btn-success btn-lg text-white px-5 mt-4 d-none d-lg-inline-block"
        href="{{ route('web.events.index')}}">More</a>
</section>
@endsection
@push('js')
<script>
    $(document).ready(function() {

        var fadeIn = function(){
            var bottom_of_window = $(window).scrollTop() + $(window).innerHeight();
            $('#carousel-news .carousel-inner .carousel-item .object').each(function(){
                if( $(this).hasClass('animated')){
                    return;
                }
                var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                /* If the object is completely visible in the window, fade it it */
                if( bottom_of_window > bottom_of_object ){
                    $(this).addClass('animated fadeInUp');
                }
            }); 
        };

        setInterval(function(){
            fadeIn();
            $('#carousel-news').carousel('pause');
        }, 1000);

    });
</script>
@endpush