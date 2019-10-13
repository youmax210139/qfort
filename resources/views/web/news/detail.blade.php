@extends('web.base')

@push('css')
<style>

</style>
@endpush
@section('content')
<section class="text-center my-5 container news-detail">
    <div class="row">
        <div class="col-12 col-lg-8 text-left">
            <img src="{{ Voyager::image($article->image) }}" alt="" class="img-fluid pb-3">
            <h3 class="mb-2 ">{{ $article->title }}
                <span class="float-right h6 mb-0 d-lg-none" style="line-height: 4vh;">{{ $article->created_at }}</span>
            </h3>
            <div class="d-lg-flex mx-0 justify-content-end align-items-center mb-3 border-bottom d-none py-3">
                @social(['title'=>$article->title, 'email'=> setting('findus.email'), 'body'=> $article->content])
                @slot('prepend')
                <div>{{ $article->created_at }}&nbsp;&nbsp;|&nbsp;&nbsp; </div>
                @endslot
                @endsocial
            </div>
            <div class="container-fluid my-5 p-0 content">
                {!! $article->content !!}
            </div>
            <div class="d-lg-none mx-0 mb-3 text-center py-3 mb-5">
                @social(['title'=>$article->title, 'email'=> setting('findus.email'), 'body'=> $article->content]) @endsocial
            </div>
            @paginator(['item'=>$article]) @endpaginator
        </div>
        <div class="col-12 col-lg-4 d-none d-lg-block">
            <h2 class="mb-3 font-weight-bold">Related articles</h2>
            @foreach($related_articles as $i => $related_article)
                @new(['item'=>$related_article])
                    @slot('className')
                    @endslot
                @endnew
            @endforeach
        </div>
        <div class="col-12 d-lg-none">
            @carouselnew(['items'=>$related_articles])@endcarouselnew
        </div>
</section>
@endsection