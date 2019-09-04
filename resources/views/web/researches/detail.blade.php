@extends('web.base')

@push('css')
<style>
</style>
@endpush
@section('content')
<section class="text-left my-5 container research-detail">

    <!-- Section heading -->
    <h1 class="font-weight-bold my-5 text-left mb-5">{{ $research->title }}</h1>
    <h3 class="mb-3">Category: {{ $research->domains()->first()->title?? '-' }}</h3>
    <img src="{{ Voyager::image($research->image) }}" class="img-fluid pb-3">
    <h3 class="mb-3 ">{{ $research->subTitle }}
        <span class="float-right h6 mb-0 d-lg-none" style="line-height: 4vh;">{{ $research->created_at }}</span>
    </h3>
    <div class="d-lg-flex mx-0 justify-content-end align-items-center mb-3 border-bottom d-none py-3">
        @social
        @slot('prepend')
        <div>{{ $research->created_at }}&nbsp;&nbsp;|&nbsp;&nbsp; </div>
        @endslot
        @endsocial
    </div>
    <div class="container-fluid my-5 p-0">
        {!! $research->content !!}
    </div>
    <div class="d-lg-none mx-0 mb-3 border-bottom text-center py-3 mb-5">
        <p>Share this Post</p>
        @social(['text'=>'']) @endsocial
    </div>
    <div class="my-5">
        @paginator(['item'=>$research]) @endpaginator
    </div>
    <h3 class="mb-5 font-weight-bold text-center text-lg-left">Other Research</h3>
    @carouselresearch(['items'=>$related_researches, 'column_count'=>4]) @endcarouselresearch
</section>
@endsection