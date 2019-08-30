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

    .card-img-top {
        width: 100%;
        height: 15vw;
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
    <div class="text-right pt-5 mb-3">@sortmenu @endsortmenu</div>
    <!-- Card -->
    <div class="card-deck">
        @foreach($events as $i => $item)
        <div class="card border-0">
            <img class="card-img-top" src="{{ Voyager::image($item->image) }}" alt="Sample image">
            <div class="date">
                {{ $item->publish_date['from']->format('M') }}<br>
                {{ $item->publish_date['from']->format('d') }}
            </div>
            <div class="card-body pt-0">
                <div class="text-left px-2">
                    <!-- Featured image -->
                    <div class="p-3 content">
                        <!-- Post title -->
                        <h4 class="font-weight-bold mb-3">
                            {{ $item->title }}
                        </h4>
                        <!-- Excerpt -->
                        <p>{{ $item->abstract }}</p>
                        <!-- Read more button -->
                        <div class="text-right">
                            <a class="btn text-success font-weight-bold"
                                href="{{ route('web.events.detail', [$item->id])}}">
                                Read more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>
@endsection