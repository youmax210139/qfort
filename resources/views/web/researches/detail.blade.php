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
    <h3 class="mb-3">{{ $research->subTitle }}</h3>
    <div class="d-flex mx-0 justify-content-end align-items-center mb-3 border-bottom flex-wrap">
        <div>{{ $research->created_at }}</div>
        |
        @social @endsocial
    </div>
    <div class="container-fluid my-5 p-0">
        {!! $research->content !!}
    </div>
    <div class="my-5">
        @paginator(['item'=>$research]) @endpaginator
    </div>
    <h3 class="mb-3 font-weight-bold">Other Research</h3>
    <div class="row">
        @foreach($related_researches as $r)
        <div class="col-md-3 col-12 mb-3">
            @post(['item'=>$r, 'href'=>route('web.researches.detail', $r->id)]) @endpost
        </div>
        @endforeach
    </div>
</section>
@endsection