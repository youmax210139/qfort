@extends('web.base')

@push('css')
<style>
    .fas {
        font-size: 1.4rem;
    }

    .btn-floating {
        vertical-align: middle;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        transition: all .2s ease-in-out;
        border-radius: 50%;
        padding: 0;
        cursor: pointer;
        width: 2rem;
        height: 2rem;
        border-width: 2px;
        font-size: 1rem;
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container about">

    <!-- Section heading -->
    <h2 class="font-weight-bold my-5 text-left mb-5">Quantum Device & Computing</h2>
    <img src="{{ Voyager::image('researchs/research2@2x.png') }}" alt="" class="img-fluid pb-3">
    <h2 class="mb-2">Title</h2>
    <div class="d-flex mx-0 justify-content-end align-items-center mb-2 border-bottom py-2 flex-wrap"">
        <div>Title July 23, 2019</div>
        |
        <div>Share this post:</div>
        <a href="" class=" btn btn-outline-success btn-floating ml-2"><i class="fab fa-facebook-f"></i></a>
        <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-instagram"></i></a>
        <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-twitter"></i></a>
        <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-youtube"></i></a>
        <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fas fa-envelope"></i></a>
        <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-line"></i></a>
        <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-facebook-f"></i></a>
    </div>
    <p>
        The place to expand your IoT horizons and create new business value. The
        Microsoft Internet of Things (IoT) Innovation Center was established back in 2016 as a key value creation hub
        for IoT in Asia that not only serves the region’s needs but also growing Global Demands in realizing new
        business value from IoT implementation. We bring with us a rich set of experience and ecosystem in bridging the
        cloud, edge, hardware, connectivity and enterprise integration needed for IoT project deployments globally.
        Customers stand to realize project success a lot quicker leveraging our expertise from reference architecture
        design to technical guidance on solution. We bring with us a rich set of experience and ecosystem in bridging
        the cloud, edge, hardware, connectivity and enterprise integration needed for IoT project deployments globally.
        The Microsoft Internet of Things (IoT) Innovation Center was established back in 2016 as a key value creation
        hub for IoT in Asia that not only serves the region’s needs but also growing Global Demands in realizing new
        business value from IoT implementation. We bring with us a rich set of experience and ecosystem in bridging the
        cloud, edge, hardware, connectivity and enterprise integration needed for IoT project deployments globally.
        Customers stand to realize project success a lot quicker leveraging our expertise from reference architecture
        design to technical guidance on solution. We bring with us a rich set of experience and ecosystem in bridging
        the cloud, edge, hardware, connectivity and enterprise integration needed for IoT project deployments globally.
    </p>

</section>
@endsection