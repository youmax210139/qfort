@extends('web.base')

@push('css')
<style>

</style>
@endpush
@section('content')
<section class="text-center my-5 container persion">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <img src="{{Voyager::image('people/jordon.png')}}" class="img-fluid">
        </div>
        <div class="col-md-4">
            <h2 class="my-5 font-weight-bold mb-2"> Michael Jordon</h2>
            <h5 class="text-danger mb-2">Superconducting Materials、Nano Devices </h5>
            <h5 class="mb-5">Department of Physics College of Sciences </h5>
            <p class="h5">
                <i class="fas fa-envelope fa-2x pr-2 text-success mb-2"></i>
                <br>EMail: mj@mail.ncku.edu.tw
            </p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-2 mt-5">
            <ul class="nav flex-column text-left pt-3 border-top ">
                <li class="nav-item">
                    <a class="nav-link active pl-0 text-dark" href="#">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-dark" href="#">Lab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-dark" href="#">Publication</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0 text-dark" href="#">Video</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <h2 class="mt-5 font-weight-bold mb-2"> Overview </h2>
            <div class="text-right"><a href="" class="btn btn-md bg-success text-white"> Download CV</a></div>
            <p class="text-left font-weight-bold">
                <strong class="h3">Principle Research Scientist</strong><br>
                Thomas Jeffrey Hanks (born July 9, 1956) is an American actor and filmmaker.
                Hanks is known for his comedic and dramatic roles in such films as Splash (1984), Big (1988), Turner &
                Hooch (1989), A League of Their Own (1992), Sleepless in Seattle (1993), Apollo 13 (1995), You've Got
                Mail (1998), The Green Mile (1999), Cast Away (2000), Road to Perdition (2002), Cloud Atlas (2012),
                Captain Phillips (2013), Saving Mr. Banks (2013), and Sully (2016). He has also starred in the Robert
                Langdon film series, and voices Sheriff Woody in the Toy Story film series. He is one of the most
                popular and recognizable film stars worldwide, and is widely regarded as an American cultural icon.<br>
                Hanks has collaborated with film director Steven Spielberg on five films to date: Saving Private Ryan
                (1998), Catch Me If You Can (2002), The Terminal (2004), Bridge of Spies (2015), and The Post (2017), as
                well as the 2001 miniseries Band of Brothers, which launched Hanks as a successful director, producer,
                and screenwriter. In 2010, Spielberg and Hanks were executive producers on the HBO miniseries The
                Pacific.
            </p>
        </div>
    </div>
</section>
@endsection