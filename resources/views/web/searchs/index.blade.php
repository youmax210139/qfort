@extends('web.base')

@push('css')
<style>
.page-item.active .page-link{
    background-color:rgb(35,142,141);
    color: #fff !important;
}
.page-item.disabled .page-link{
    color: #474645 !important;
}
</style>
@endpush
@section('content')

<section class="text-left my-5 container">
    <h3 class="my-3">People</h3>
    @foreach ($peoples->getCollection() as $item)
    <a href="{{$item->link}}" class="text-dark h5"> {{ $item->title}}</a>
    <div class="h6 font-italic">{!! $item->abstract !!}</div>
    @endforeach
    <h3 class="my-3">Domain</h3>
    @foreach ($domains->getCollection() as $item)
    <a href="{{$item->link}}" class="text-dark h5"> {{ $item->title}}</a>
    <div class="h6 font-italic">{!! $item->abstract !!}</div>
    @endforeach
    <h3 class="my-3">New</h3>
    @foreach ($articles->getCollection() as $item)
    <a href="{{$item->link}}" class="text-dark h5"> {{ $item->title}}</a>
    <div class="h6 font-italic">{!! $item->abstract !!}</div>
    @endforeach
    <h3 class="my-3">Research</h3>
    @foreach ($researches->getCollection() as $item)
    <a href="{{$item->link}}" class="text-dark h5"> {{ $item->title}}</a>
    <div class="h6 font-italic">{!! $item->abstract !!}</div>
    @endforeach
    <h3 class="my-3">Event</h3>
    @foreach ($events->getCollection() as $item)
    <a href="{{$item->link}}" class="text-dark h5"> {{ $item->title}}</a>
    <div class="h6 font-italic">{!! $item->abstract !!}</div>
    @endforeach
    <nav class="my-5 ">
        <ul class="pagination border-0">
            <li class="page-item  {{ $current_page==1?'disabled':'' }}">
                <a class="page-link border-0 text-success" href="{{ request()->fullUrlWithQuery(['page' => $current_page-1]) }}">Previous</a>
            </li>
            @for ($i=1;$i<=$total_page; $i++) 
            <li class="page-item  {{ $current_page==$i?'active':'' }}">
                <a class="page-link border-0 text-success" href="{{ request()->fullUrlWithQuery(['page' => $i]) }}">
                    {{ $i }}
                </a>
            </li>
            @endfor
            <li class="page-item {{ $current_page==$total_page?'disabled':'' }}">
                <a class="page-link border-0 text-success" href="{{ request()->fullUrlWithQuery(['page' => $current_page+1]) }}">Next</a>
            </li>
        </ul>
    </nav>
</section>

@endsection