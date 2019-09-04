@push('css')
<style>
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

    .btn-floating:hover {
        background-color: #1A1311;
        border-color: #1A1311;
    }
</style>
@endpush
@php
$links = [
['class'=> 'fab fa-facebook-f', 'href'=>'https://www.facebook.com/sharer/sharer.php?u='
.urlencode(request()->url()),'name'=>'facebook'],
['class'=> 'fab fa-instagram',
'href'=>'https://social-plugins.line.me/lineit/share?url='
.urlencode(request()->url()),'name' => 'instagram'],
['class'=> 'fab fa-twitter', 'href'=>'https://social-plugins.line.me/lineit/share?url='.
urlencode(request()->url()), 'name'=>'twitter'],
['class'=> 'fab fa-youtube', 'href'=>'https://social-plugins.line.me/lineit/share?url='.
urlencode(request()->url()), 'name'=>'youtube'],
['class'=> 'fab fa-line', 'href'=>'https://social-plugins.line.me/lineit/share?url='.
urlencode(request()->url()), 'name'=>'line'],
]
@endphp
<div class="d-inline-flex align-items-center justify-content-center flex-wrap">
    {{ $prepend??'' }}
    <div class="w-100 w-lg-auto text-center mb-3 mb-lg-0 mr-lg-2">{{ $text?? 'Share this post:' }}</div>
    @foreach($links as $i=>$link)
    <a href="{{$link['href']}}" class="btn btn-outline-success btn-floating {{ $i>0?'ml-2':'' }}" target="_blank">
        <i class="{{ $link['class']}}"></i>
    </a>
    @endforeach
    {{ $append??'' }}
</div>