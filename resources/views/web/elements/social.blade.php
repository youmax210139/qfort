@pushonce('css:social')
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
@endpushonce
@php
$links = [
['class'=> 'fab fa-facebook-f', 'href'=>'https://www.facebook.com/sharer/sharer.php?u='
.urlencode(request()->url())],
['class'=> 'fab fa-twitter', 'href'=>'https://twitter.com/intent/tweet?url='.
urlencode(request()->url()) ],
['class'=> 'fab fa-line', 'href'=>'https://social-plugins.line.me/lineit/share?url='.
urlencode(request()->url()) ],
['class'=> 'fab fa-linkedin-in', 'href'=>'https://www.linkedin.com/shareArticle?mini=true&url='.
urlencode(request()->url()) ],
['class'=> 'fab fa-pinterest', 'href'=>'http://pinterest.com/pin/create/button/?url='.
urlencode(request()->url()) ],
['class'=> 'fas fa-copy', 'href'=>urlencode(request()->url()) ],
['class'=> 'fas fa-envelope', 'href'=>'mailto:' . $email . '&subject='. $title ]
];
@endphp
<div class="d-inline-flex align-items-center justify-content-center flex-wrap">
    {{ $prepend??'' }}
    <div class="w-100 w-lg-auto text-center mb-3 mb-lg-0 mr-lg-2">{{ $text?? 'Share this post:' }}</div>
    <input type="hidden" value="" id="clipboard">
    @foreach($links as $i=>$link)
    <a href="{{$link['href']}}" class="btn btn-outline-success btn-floating {{ $i>0?'ml-2':'' }}" 
        target="_blank" 
        name="{{ str_replace(' ', '_', $link['class']) }}">
        <i class="{{ $link['class'] }}"></i>
    </a>
    @endforeach
    {{ $append??'' }}
</div>
@pushonce('js:social')
    <script>
        $('a[name="fas_fa-copy"]').click(function(e){
            e.preventDefault();
            console.log($(this).attr('href'));
        })
    </script>
@endpushonce