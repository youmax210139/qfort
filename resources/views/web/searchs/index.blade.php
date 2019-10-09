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
em{
    color: red !important;
}
</style>
@endpush
@section('content')

<section class="text-left my-5 container">

    @foreach(compact('researches', 'peoples', 'news', 'events', 'abouts') as $title => $data)
        <h3 class="my-3">{{ $title }}</h3>
        @foreach ($data->getCollection() as $item)
        <a href="{{$item->link}}" class="text-dark h5"> {!! $item->highlightTitle !!}</a>
        <div class="h6 font-italic">{!! $item->highlight !!}</div>
        @endforeach
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