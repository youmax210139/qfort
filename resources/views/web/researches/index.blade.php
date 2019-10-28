@extends('web.base')

@push('css')
<style>
    #overview,
    #focus,
    #public_database {
        display: block;
        position: relative;
        top: -148px;
        visibility: hidden;
    }

    @media (min-width: 992px) {

        #overview,
        #focus,
        #public_database {
            display: block;
            position: relative;
            top: -123px;
            visibility: hidden;
        }
    }
</style>
@endpush
@section('content')
<a id="overview"></a>
<div class="container-lg bg-dark-silver my-lg-5 px-3">
    <div class="row px-3">
        <div class="col-12 col-lg-12 p-lg-5 py-5">
            <h1 class="font-weight-bold text-left mb-2">{{ setting('research-overview.overview_title') }}</h1>
            <h3 class="text-left mb-2">{{ setting('research-overview.overview_subtitle') }}</h3>
            <p class="mb-5 h5 text-left">
                {{ setting('research-overview.overview_description') }}
            </p>
        </div>
    </div>
</div>
<a id="roadmap"></a>
<div class="container-lg text-center text-dark my-lg-5 px-3 pt-5 pt-lg-0">
    <!-- Section heading -->
    <div class="row">
        <div class="col-12 col-lg-6 pr-lg-5 mb-3 mb-lg-0">
            <img src="{{ Voyager::image(setting('research-overview.roadmap_image')) }}" class="w-100 img-fluid">
        </div>
        <div class="col-12 col-lg-6 px-5">
            <div class="d-flex flex-column h-100 justify-content-start text-left">
                <h1 class="mb-3">{{ setting('research-overview.roadmap_title') }}</h1>
                <p class="mb-3 h5 text-left">
                    {{ setting('research-overview.roadmap_description') }}
                </p>
            </div>
        </div>
    </div>
</div>
<a id="focus"></a>
<div class="container-lg bg-dark-silver my-lg-5 px-3 pt-3 pt-lg-0">
    <div class="row px-3">
        <div class="col-12 col-lg-12 p-lg-5 py-5">
            <h1 class="font-weight-bold text-left mb-2">{{ setting('research-overview.focus_title') }}</h1>
            <h3 class="text-left mb-2">{{ setting('research-overview.focus_subtitle') }}</h3>
            <p class="mb-5 h5 text-left">
                {{ setting('research-overview.focus_description') }}
            </p>
        </div>
    </div>
</div>
<a id="domains"></a>
<div class="bg-xs-light-silver bg-lg-white text-center container-lg px-3 my-lg-5 pt-5 pt-lg-0">
    <!-- Section heading -->
    @foreach($domains as $domain)
    <div class="row">
        <div class="col-12 d-lg-none bg-light-silver">
            <img src="{{ Voyager::image($domain->image) }}" alt="" class="w-100 img-fluid my-3">
        </div>
        <div class="col-12 col-lg-7 mb-5 text bg-light-silver">
            <div class="d-flex flex-column h-100 justify-content-center text-left p-lg-5">
                <h1 class="py-2 mb-3 font-weight-bold border-bottom border-dark mt-auto">{{ $domain->title }}</h1>
                <p class="mb-3 h5 text-left">{{ $domain->abstract }}</p>
                <a href="{{route('web.researches.domains.detail', $domain->id)}}"
                    class="btn text-success ml-auto text-uppercase font-weight-bolder mt-auto"> Read More</a>
            </div>
        </div>
        <div class="d-none d-lg-flex col-lg-5 mb-5 background-size-cover background-position-center min-vh-lg-50"
            style="background-image:url({{ Voyager::image($domain->image) }});">
        </div>
    </div>
    @endforeach
</div>
<a id="public_database"></a>
<div class="container-lg bg-dark-silver my-lg-5 px-3">
    <div class="row px-3">
        <div class="col-12 col-lg-12 p-lg-5 py-5">
            <h1 class="font-weight-bold text-left mb-2">{{ setting('research-overview.public_database_title') }}</h1>
            <h3 class="text-left mb-2">{{ setting('research-overview.public_database_subtitle') }}</h3>
            <p class="mb-5 h5 text-left">
                {{ setting('research-overview.public_database_description') }}
            </p>
        </div>
    </div>
</div>
@endsection
