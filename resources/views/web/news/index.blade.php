@extends('web.base')

@push('css')
<style>
    .card .content {
        background-color: #F6F6F6 !important;
    }
</style>
@endpush

@section('content')
@carousel([
'items' => $carousels,
'type' => 'half'
])
@endcarousel
<section class="text-center my-5 container about">
    <!-- Section heading -->
    <div class="px-4">
        <h1 class="font-weight-bold mt-5 text-left mb-0">New</h1>
        <h3 class="text-left mb-5">We are a diverse group of thinkers and inventors</h3>
        <div class="text-right mb-3">@sortmenu(['menus'=>$categories]) @endsortmenu</div>
    </div>
    <div class="card-columns card-col-xs-1 card-col-md-2 card-col-lg-3">
        @foreach($articles as $i => $article)
        <div class="card border-0">
            <div class="card-body">
                <div class="text-left px-2">
                    <!-- Featured image -->
                    <div class="mb-0 view overlay zoom">
                        <a href="{{ route('web.news.detail', $article->id)}}">
                            <img class="img-fluid" src="{{ Voyager::image($article->image) }}">
                            <div class="mask"></div>
                        </a>
                    </div>
                    <div class="p-3 content">
                        <!-- Post title -->
                        <h4 class="font-weight-bold mb-3">
                            {{ $article->title }}
                        </h4>
                        <!-- Post data -->
                        <p>
                            {{ $article->created_at }}
                            /
                            <span class="text-success">{{ $article->firstCategory }}</span>
                        </p>
                        <p>{!! $article->abstract !!}</p>
                        <div class="text-right">
                            <a class="btn text-success font-weight-bold"
                                href="{{ route('web.news.detail', $article->id)}}">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>
@endsection