@extends('web.base')

@push('css')
<style>
    .card .content {
        background-color: #F6F6F6 !important;
    }
</style>
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
    <div class=" col-4">
        <h2 class="mb-3 font-weight-bold">Related articles</h2>
        @foreach($related_articles as $i => $related_article)
        <div class="card border-0">
            <div class="card-body">
                <div class="text-left px-2">
                    <!-- Featured image -->
                    <div class="mb-0 view overlay zoom">
                        <img class="img-fluid" src="{{ Voyager::image($related_article->image) }}">
                        <div class="mask"></div>
                    </div>
                    <div class="p-3 content">
                        <!-- Post title -->
                        <h4 class="font-weight-bold mb-3">
                            {{ $related_article->title }}
                        </h4>
                        <!-- Post data -->
                        <p>June {{$i}}th, 2019 /
                            <span class="text-success">{{ $related_article->firstCategory }}</span>
                        </p>
                        <!-- Excerpt -->
                        <p>{!! $related_article->abstract !!}</p>
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
</section>
@endsection