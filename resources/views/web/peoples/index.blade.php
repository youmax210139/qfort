@extends('web.base')

@push('css')
<style>

</style>
@endpush
@section('content')
<section class="text-center my-5 container about">

    <!-- Section heading -->
    <h2 class="font-weight-bold my-5 text-left mb-5">{{ setting('people.title') }}</h2>
    <h4 class="text-left mb-5">{{ setting('people.subtitle') }}</h4>
    <div class="text-right mb-3">@sortmenu(['menus'=>$categories]) @endsortmenu</div>
    <h4 class="font-weight-bold mb-3"> {{ request()->c??'[All]' }} </h4>
    <!-- Grid row -->
    <div class="row">
        @foreach ($peoples as $i=>$people)
        <!-- Grid column -->
        @figure(['item' => $people, 'push'=>$i==0])
        <p class="text-uppercase blue-text font-weight-bold">
            {{ $people->job }}
        </p>
        @endfigure
        <!-- Grid column -->
        @endforeach
    </div>
    <!-- Grid row -->

</section>
@endsection