@extends('web.base')

@push('css')
<style>

</style>
@endpush
@section('content')
<section class="text-center my-5 container about">

    <!-- Section heading -->
    <h2 class="font-weight-bold my-5 text-left mb-5">People</h2>
    <h4 class="text-left mb-5">People We are a diverse group of thinkers and inventors</h4>
    <h4 class="font-weight-bold mb-3"> [All] </h4>
    @php
    $items = [
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg",
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg",
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" ,
    "https://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg",
    ];
    @endphp
    <!-- Grid row -->
    <div class="row">
        @foreach ($items as $item)
        <!-- Grid column -->
        <div class="col-lg-3 col-md-4 mb-2 mb-5">
            <div class="mx-auto">
                <img src="{{$item}}" class="rounded-circle img-fluid" alt="Sample avatar">
            </div>
            <a href="/peoples/michaelJordon">
                <h5 class="font-weight-bold mt-4 mb-3">
                    Anna Williams
                </h5>
            </a>
            <p class="text-uppercase blue-text"><strong>Graphic designer</strong></p>
        </div>
        <!-- Grid column -->
        @endforeach
    </div>
    <!-- Grid row -->

</section>
@endsection