@php
$push = $push??true;
@endphp
@push('css')
@if($push)
<style>
    .event-header-content {
        position: absolute;
        bottom: 0;
        background: #FFFFFF;
        opacity: 0.9;
        text-align: left;
        padding: .5rem;
    }

    .event-header .img-fluid {
        min-height: 400px;
        object-fit: cover;
    }
</style>
@endif
@endpush

<div class="zoom view overlay h-100 event-header">
    <a href="{{ route('web.events.detail', $item->id)}}">
        {{-- <div class="event-header h-100" style="background-image:url({{ Voyager::image($item->image) }})">
</div> --}}
<img src="{{ Voyager::image($item->image)}}" alt="" class="img-fluid {{ $imgClass??''}}">
<div class="mask"></div>
</a>
<div class="w-100 event-header-content p-2">
    <!-- Post title -->
    <h4 class="font-weight-bold mb-3">{{ $item->title }}</h4>
    <!-- Post data -->
    <p>{{ $item->publish_from }} / <a class="text-success">The Latest News</a></p>
</div>
</div>