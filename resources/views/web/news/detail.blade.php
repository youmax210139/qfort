@extends('web.base')

@push('css')

@endpush
@section('content')
<section class="text-center my-5 container news-detail">
    <div class="row">
        <div class="col-8 text-left">
            <img src="{{ Voyager::image($article->image) }}" alt="" class="img-fluid pb-3">
            <h2 class="mb-2">{{ $article->title }}</h2>
            <div class="d-flex mx-0 justify-content-end align-items-center mb-2 border-bottom py-2 flex-wrap"">
                {{ $article->created_at }}
                &nbsp;|&nbsp;
                @social(['title'=>'Share this post:']) @endsocial
            </div>
            <p>
                {!! $article->content !!}
            </p>
    </div>
    @php
    $items = [
    ['img'=> Voyager::image('index/event1@2x.png'), 'text'=>str_random(80)],
    ['img'=> Voyager::image('index/event2@2x.png'), 'text'=>str_random(160)],
    ['img'=> Voyager::image('index/event3@2x.png'), 'text'=>str_random(20)],
    ]
    @endphp
    <div class=" col-4">
                <h2 class="mb-3">Related articles</h2>
                @foreach($items as $i => $item)
                <div class="card border-0">
                    <div class="card-body">
                        <div class="text-left px-2">
                            <!-- Featured image -->
                            <div class="mb-0">
                                <img class="img-fluid" src="{{ $item['img'] }}" alt="Sample image">
                            </div>
                            <div class="p-3 content">
                                <!-- Post title -->
                                <h4 class="font-weight-bold mb-3">
                                    <strong>
                                        How will nano technology change modern
                                        medicine?
                                    </strong>
                                </h4>
                                <!-- Post data -->
                                <p>June {{$i}}th, 2019 / <a class="text-success">The Latest News</a></p>
                                <!-- Excerpt -->
                                <p>{{ $item['text'] }}</p>
                                <!-- Read more button -->
                                <div class="text-right">
                                    <a class="btn text-success font-weight-bold" href="/news/1">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

</section>
@endsection