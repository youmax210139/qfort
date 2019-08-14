@extends('web.layout')

@section('content')
@carousel @endcarousel
<!-- Section: Products v.1 -->
<section class="text-center my-5 container">

    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold text-center my-5">In the NEWS today</h2>
    @php
    $items= [1,2,3,4,5,6];
    @endphp
    <!-- Grid row -->
    <div class="row">
        @foreach ($items as $item)

        <!-- Grid column -->
        <div class="col-lg-4 col-md-12 mb-4 text-left">
            <!-- Featured image -->
            <div class="view overlay rounded z-depth-2 mb-0">
                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/81.jpg" alt="Sample image">
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <div class="bg-secondary p-3">

                <!-- Post title -->
                <h4 class="font-weight-bold mb-3"><strong>How will nano technology change modern medicine?</strong></h4>
                <!-- Post data -->
                <p>June 10th, 2019 / <a class="text-success">The Latest News</a></p>
                <!-- Excerpt -->
                <p>Amazing new age technology that has unseen design elements with an incredible
                    use of technological design sense and imagery.</p>
                <!-- Read more button -->
                <div class="text-right"><a class="btn text-success font-weight-bold">Read more</a></div>
            </div>

        </div>
        <!-- Grid column -->
        @endforeach
    </div>
    <!-- Grid row -->

</section>
<!-- Section: Products v.1 -->
@endsection