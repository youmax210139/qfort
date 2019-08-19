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
    <!-- Section heading -->
    @php
    $items = [
    ['img'=> Voyager::image('news/news1@2x.png'), 'text'=>str_random(20)],
    ['img'=> Voyager::image('news/news2@2x.png'), 'text'=>str_random(20)],
    ['img'=> Voyager::image('news/news3@2x.png'), 'text'=>str_random(20)],
    ['img'=> Voyager::image('news/news4@2x.png'), 'text'=>str_random(20)],
    ['img'=> Voyager::image('news/news5@2x.png'), 'text'=>str_random(20)],
    ['img'=> Voyager::image('news/news6@2x.png'), 'text'=>str_random(20)],
    ['img'=> Voyager::image('news/news7@2x.png'), 'text'=>str_random(20)],
    ['img'=> Voyager::image('news/news8@2x.png'), 'text'=>str_random(20)]
    ]
    @endphp
    <!-- Card -->
    <div class="card-deck">
        @foreach($items as $i => $item)
        <div class="card border-0">

            <img class="card-img-top" src="{{ $item['img'] }}" alt="Sample image">
            <div class="date">Jul<br>24</div>
            <div class="card-body pt-0">
                <div class="text-left px-2">
                    <!-- Featured image -->
                    <div class="p-3 content">
                        <!-- Post title -->
                        <h4 class="font-weight-bold mb-3">
                            Conferences
                        </h4>
                        <!-- Excerpt -->
                        <p>{{ $item['text'] }}</p>
                        <!-- Read more button -->
                        <div class="text-right">
                            <a class="btn text-success font-weight-bold" href="/events/1">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>
@endsection