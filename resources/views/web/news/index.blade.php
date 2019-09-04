@extends('web.base')

@push('css')
<style>

</style>
@endpush

@section('content')
{{-- @carousel([
'items' => $carousels,
'type' => 'half'
])
@endcarousel --}}
<section class="text-center my-5 container">
    <!-- Section heading -->
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold mt-5 text-left mb-0">New</h1>
            <h3 class="text-left mb-5">We are a diverse group of thinkers and inventors</h3>
            <div class="text-right mb-3">@sortmenu(['menus'=>$categories]) @endsortmenu</div>
            @carouselnew(['items'=>$articles])@endcarouselnew
        </div>

    </div>

</section>
@endsection