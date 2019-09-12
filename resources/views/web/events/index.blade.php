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
    <img class="img-fluid" src="{{ Voyager::image(setting('event.image')) }}">
    <div class="mask text-dark">
        <h1 class="font-weight-bold text-left mb-2">{{setting('event.title')}}</h1>
        <h3 class="text-left mb-2">{{setting('event.subtitle')}}</h3>
    </div>
</div>
<section class="text-center mb-5 container">
    <div class="title-wrapper mb-4 d-none d-lg-block">
        <img class="img-fluid" src="{{ Voyager::image('news/news8@2x.png') }}">
        <div class="mask text-dark">
            <h1 class="font-weight-bold text-left mb-2">Events</h1>
            <h3 class="text-left mb-2">See what’s going on at QFort</h3>
        </div>
    </div>
    <div class="text-right mt-5 mb-3">@sortmenu(['menus'=>$categories]) @endsortmenu</div>
    <!-- Card -->
    <div class="card-deck card-col-xs-1 card-col-lg-3">
        @foreach($events as $event)
        <div class="card border-0 mb-5">
            <img class="card-img-top object-fit-cover" src="{{ Voyager::image($event->image) }}">
            <div class="card-body pt-0 border-silver border flex-column text-left border-bottom-0 pb-0">
                <div class="bg-gray mb-2 text-white date text-center w-6-vh vh-6
                d-flex align-items-center justify-content-center">
                    {{ $event->publish_date['from']->format('M') }}<br>
                    {{ $event->publish_date['from']->format('d') }}
                </div>

                <!-- Post title -->
                <h4 class="font-weight-bold mb-3">
                    {{ $event->title }}
                </h4>
                <!-- Excerpt -->
                <div class="mb-3">{!! $event->abstract !!}</div>
            </div>
            <div class="card-footer text-right bg-white border border-silver border-top-0 pt-0">
                <a class="btn text-success font-weight-bold" href="{{ route('web.events.detail', [$event->id])}}">
                    Read more
                </a>
            </div>
        </div>
        @endforeach
    </div>

</section>
@endsection