@extends('web.base')

@push('css')
<style>
    .title-wrapper {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .mask {
        background: #FFFFFF;
        opacity: 0.9;
        text-align: left;
        padding: 1rem;
        position: absolute;
        bottom: 20px;
        width: 95%;
        left: 2.5%;
    }

    .card .bg-gray {
        margin-top: -3vh;
    }

    .card .position-absolute {
        left: 0;
        bottom: 0;
    }
</style>
@endpush
@section('content')

<div class="title-wrapper mb-3 d-lg-none">
    <img class="img-fluid w-100" src="{{ Voyager::image($carousel->source) }}">
    <div class="mask text-dark">
        <h1 class="font-weight-bold text-left mb-2">{{setting('event-introduction.title')}}</h1>
        <h3 class="text-left mb-2">{{setting('event-introduction.subtitle')}}</h3>
    </div>
</div>
<section class="text-center mb-5 container">
    <div class="title-wrapper mb-4 d-none d-lg-block">
        <img class="img-fluid w-100" src="{{ Voyager::image($carousel->source) }}">
        <div class="mask text-dark">
            <h1 class="font-weight-bold text-left mb-2">{{setting('event-introduction.title')}}</h1>
            <h3 class="text-left mb-2">{{setting('event-introduction.subtitle')}}</h3>
        </div>
    </div>
    <div class="text-right mt-5 mb-3">@sortmenu(['menus'=>$categories]) @endsortmenu</div>
    <!-- Card -->
    <div class="card-deck card-col-xs-1 card-col-lg-3">
        @foreach($events as $event)
            @event2(['item'=>$event])
            @slot('imgClassName')
            h-lg-18-vw
            @endslot
            @endevent2
        @endforeach
    </div>

</section>
@endsection

@push('js')
<script src="{{ asset('js/multiline-ellipsis.js') }}"> </script>
<script>
    $(function(){
            $('.card_title').ellipsis();
            $('.card_abstract').ellipsis();
        });
</script>
@endpush

