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
</style>
@endpush
@php
$links = [
'facebook' => ['class'=> 'fab fa-facebook-f', 'href'=>'https://www.facebook.com/sharer/sharer.php?u='.
urlencode(request()->url())],
'instagram' => ['class'=> 'fab fa-instagram', 'href'=>'https://social-plugins.line.me/lineit/share?url='.
urlencode(request()->url())],
'twitter' => ['class'=> 'fab fa-twitter', 'href'=>'https://social-plugins.line.me/lineit/share?url='.
urlencode(request()->url())],
'youtube' => ['class'=> 'fab fa-youtube', 'href'=>'https://social-plugins.line.me/lineit/share?url='.
urlencode(request()->url())],
'line' => ['class'=> 'fab fa-line', 'href'=>'https://social-plugins.line.me/lineit/share?url='.
urlencode(request()->url())],
'facebook' => ['class'=> 'fab fa-facebook-f', 'href'=>'https://social-plugins.line.me/lineit/share?url='.
urlencode(request()->url())],
]
@endphp
<div class=" d-inline-flex align-items-center justify-content-center">
    <span>{{ $text?? 'Share this post:' }}</span>
    @foreach($links as $link)
    <a href="{{$link['href']}}" class="btn btn-outline-success btn-floating ml-2" target="_blank">
        <i class="{{ $link['class']}}"></i>
    </a>
    @endforeach
    {{-- <a href="" class=" btn btn-outline-success btn-floating ml-2"><i class="fab fa-facebook-f"></i></a>
    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-instagram"></i></a>
    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-twitter"></i></a>
    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-youtube"></i></a>
    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-line"></i></a>
    <a href="" class="btn btn-outline-success btn-floating ml-2"><i class="fab fa-facebook-f"></i></a> --}}
</div>