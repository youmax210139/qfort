@extends('web.base')

@push('css')
<style>
    #domain .nav-item:hover .nav-link,
    #domain .nav-item.active .nav-link {
        color: #217D7B !important;
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container" id="domain">
    <h1 class="font-weight-bold text-left mb-0">{{ $domain->title }}</h1>
    <h4 class="text-left mb-4 font-weight-light text-gray">{{ $domain->subTitle}}</h4>
    <div class="row">
        <div class="col-12 col-lg-9">
            <p class="mb-3 h5 text-left">{{ $domain->description }}</p>
            <h2 class="font-weight-bold my-5 text-center mb-5">{{setting('domain.outcome_title')}}</h2>
            @carouselresearch(['items'=>$domain->researches, 'column_count'=>'2']) @endcarouselresearch
            <h2 class="font-weight-bold my-5 text-center mb-5">{{setting('domain.area_title')}}</h2>
            @carouselfigure(['items'=>$domain->peoples]) @endcarouselfigure
        </div>
        <div class="col-lg-3 d-none d-lg-flex">
            <ul class="nav flex-column border-top border-dark justify-content-start h-100 text-left pt-5">
                @foreach($domains as $d)
                <li class="nav-item {{ $domain->id == $d->id?'active':'' }}">
                    <a class="nav-link text-dark pl-0" href="{{ route('web.researches.domains.detail', $d->id) }}">
                        {{ $d->title}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection