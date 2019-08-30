@push('css')
<style>
    .sortmenu .dropdown-menu .dropdown-item:hover {
        color: #217D7B;
    }
    .sortmenu .dropdown-item:active {
        color: #217D7B;
        background-color: #fff;
    }
    .sortmenu .dropdown-menu{
        width: 50vw !important;
    }
    @media (min-width: 576px) {
        .sortmenu .dropdown-menu{
            width: 30vw !important;
        }
    }
}
</style>
@endpush
@php
$menus = $menus?? [
'Category1'=>'#',
'Category2'=>'#',
'Category3'=>'#',
'Category4'=>'#',
]
@endphp
<div class="btn-group sortmenu">
    <button type="button" class="btn btn-md text-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        {{ $text?? 'Sort'}}
    </button>
    <div class="dropdown-menu dropdown-menu-right border-0 text-right">
        @foreach($menus as $menu => $link)
        <a class="dropdown-item pr-1 py-2" href="{{$link }}"> {{ $menu }}</a>
        @endforeach
    </div>
</div>