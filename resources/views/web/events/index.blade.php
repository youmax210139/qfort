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

    .card .card-img-top{
        object-fit: cover;
    }
    .card .date {
        background-color: #302D2C;
        padding: .75rem;
        color: white;
        width: 3.75rem;
        height: 3.75rem;
        text-align: center;
        margin-top: -1.875rem;
    }

    .card .position-absolute {
        left: 0;
        bottom: 0;
    }
</style>
@endpush
@section('content')

<section class="text-center mb-5 container event-listing">
    <div class="title-wrapper mb-4">
        <img class="img-fluid" src="{{ Voyager::image('news/news8@2x.png') }}">
        <div class="mask text-dark">
            <h1 class="font-weight-bold text-left mb-2">Events</h1>
            <h3 class="text-left mb-2">See what’s going on at QFort</h3>
        </div>
    </div>
    <div class="text-right pt-5 mb-3">@sortmenu(['menus'=>$categories]) @endsortmenu</div>
    <!-- Card -->
    <div class="card-deck card-col-xs-1 card-col-md-2 card-col-lg-3">
        @foreach($events as $event)
        <div class="card border-0 mb-5">
            <img class="card-img-top vh-20 w-100" src="{{ Voyager::image($event->image) }}">
            <div class="card-body pt-0 border-silver border">
                <div class="date mb-2">
                    {{ $event->publish_date['from']->format('M') }}<br>
                    {{ $event->publish_date['from']->format('d') }}
                </div>
                <div class="text-left">
                    <!-- Post title -->
                    <h4 class="font-weight-bold mb-3">
                        {{ $event->title }}
                    </h4>
                    <!-- Excerpt -->
                    <div class="mb-3">{!! $event->abstract !!}</div>
                    <!-- Read more button -->
                    <div class="text-right position-absolute mb-2 w-100">
                        <a class="btn text-success font-weight-bold"
                            href="{{ route('web.events.detail', [$event->id])}}">
                            Read more
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>
@endsection