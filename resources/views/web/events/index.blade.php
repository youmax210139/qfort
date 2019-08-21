@extends('web.base')

@push('css')
<style>
    .title-wrapper {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        min-height: 582px;
    }

    .mask {
        background: #FFFFFF;
        opacity: 0.9;
        text-align: left;
        padding: 1rem;
        position: absolute;
        bottom: 1rem;
        width: 80%;
        left: 10%;
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
<div class="col title-wrapper mb-4" style="background-image:url({{ Voyager::image('news/news8@2x.png') }});">
    <img class="img-fluid" src="">
    <div class="mask text-dark">
        <h2 class="font-weight-bold text-left mb-2"><strong>Events</strong></h2>
        <h4 class="text-left mb-2">See what’s going on at QFort</h4>
    </div>
</div>
<section class="text-center my-5 container event-listing">
    <!-- Card -->
    <div class="card-deck">
        @foreach($events as $i => $item)
        <div class="card border-0">
            <img class="card-img-top" src="{{ $item->image }}" alt="Sample image">
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