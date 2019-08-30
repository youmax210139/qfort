@extends('web.base')

@push('css')
<style>
    .image-box {
        position: relative;
        width: 100%;
        /* desired width */
        margin: 5px;

    }

    .image-box:before {
        content: "";
        display: block;
        padding-top: 100%;
        /* initial ratio of 1:1*/
    }

    .image-content {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: transparent;
        color: #fff;
        line-height: 100%;
        height: 100%;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    a.text-dark:hover{
        color: #217D7B !important;
        text-decoration: none;
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container about">

    <!-- Section heading -->
    <h2 class="font-weight-bold my-5 text-left mb-5">People</h2>
    <h4 class="text-left mb-5">People We are a diverse group of thinkers and inventors</h4>
    <h4 class="font-weight-bold mb-3"> [All] </h4>
    <!-- Grid row -->
    <div class="row">
        @foreach ($peoples as $people)
        <!-- Grid column -->
        <div class="col-lg-3 col-md-4 mb-2 mb-5">
            <div class="image-box">
                <a href="{{ route('web.peoples.detail', $people->id)}}">
                    <div class="image-content">
                        <div class="view overlay zoom rounded-circle w-100 h-100">
                            <img class="w-100 h-100" src="{{ Voyager::image($people->image) }}">
                            <div class="mask "></div>
                        </div>
                    </div>
                </a>
            </div>
            <h5 class="font-weight-bold mt-4 mb-3">
                <a class="text-dark" href="{{ route('web.peoples.detail', $people->id) }}"> {{ $people->name }}</a>
            </h5>

            <p class="text-uppercase blue-text font-weight-bold">
                {{ $people->job }}
            </p>
        </div>
        <!-- Grid column -->
        @endforeach
    </div>
    <!-- Grid row -->

</section>
@endsection