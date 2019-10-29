@extends('web.base')

@push('css')
<style>

</style>
@endpush

@section('content')
@carouselvertical(['items' => $carousels])@endcarouselvertical
<section class="text-center my-5 container">
    <!-- Section heading -->
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold mt-5 text-left mb-0">{{ setting('new-introduction.title') }}</h1>
            <h3 class="text-left mb-5">{{setting('new-introduction.subtitle')}}</h3>
            <div class="text-right mb-3">@sortmenu(['menus'=>$categories]) @endsortmenu</div>
        </div>
        @foreach($articles as $article)
        @new(['item'=>$article])
        @slot('className')
        col-lg-4
        @endslot
        @slot('imgClassName')
        h-lg-18-vw
        @endslot
        @endnew
        @endforeach
    </div>

</section>
@endsection

@push('js')
<script src="{{ asset('js/multiline-ellipsis.js') }}"> </script>
<script>
    $(function(){
            $('.card_title').ellipsis();
            $('.card_abstract').ellipsis();
        });
</script>
@endpush
