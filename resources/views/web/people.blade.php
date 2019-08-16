@extends('web.layout')

@push('css')
<style>

</style>
@endpush
@section('content')
<section class="text-center my-5 container about">

    <!-- Section heading -->
    <h2 class="font-weight-bold my-5 text-left">People</h2>
    <p class="text-left mb-5">People We are a diverse group of thinkers and inventors</p>
    <p class="font-weight-bold h3 mb-3"> [All] </p>
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
        <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
            <div class="avatar mx-auto">
                <img src="{{$item}}" class="rounded-circle z-depth-1" alt="Sample avatar">
            </div>
            <h5 class="font-weight-bold mt-4 mb-3">Anna Williams</h5>
            <p class="text-uppercase blue-text"><strong>Graphic designer</strong></p>
        </div>
        <!-- Grid column -->
        @endforeach
    </div>
    <!-- Grid row -->

</section>
@endsection