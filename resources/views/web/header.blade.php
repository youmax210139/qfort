@push('css')
<style>
    header .nav-link{
        white-space: nowrap !important;
    }

    header .nav-link.text-dark:hover {
        background-color: #000 !important;
        color: #fff !important;
    }

    header .has-search input {
        padding: 0 28px 0 0;
        border: 2px solid #000;
        border-radius: 0px;
    }

    header .has-search .icon-wrapper {
        position: absolute;
        z-index: 4;
        right: 0;
        display: flex;
        width: 28px;
        height: 100%;
        align-items: center;
        justify-content: center;
        pointer-events: none;
    }

    header .has-search .icon-wrapper img {
        width: 16px;
        height: 16px;
    }

    @media (min-width: 992px) {

        header .dropdown-menu {
            top: auto;
            left: auto;
        }

        header .dropdown-menu.show {
            display: none;
        }

        header .navbar-nav li:hover>.dropdown-menu {
            display: block;
        }

        a.navbar-brand {
            width: 14% !important;
        }
    }
</style>
@endpush
@push('modal')
<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Search</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <script async src="https://cse.google.com/cse.js?cx=015838847960826963595:xisocxoxhgz"></script>
                <script>
                    window.onload = function(){
                    document.getElementById('gsc-i-id1').placeholder = 'Search';
                };
                </script>
                <div class="gcse-search"></div>
            </div>
        </div>
    </div>
</div>
@endpush
<header class="font-weight-bold fixed-top bg-white py-2 pt-lg-4">
    <nav class="container-lg navbar navbar-expand-lg align-items-center align-items-lg-end justify-content-lg-start
        justify-content-space px-lg-0">
        <div class="w-100 d-flex d-lg-none align-items-center justify-content-end">
            <a data-toggle="modal" data-target="#searchModal" class="btn btn-default navbar-btn p-0">
                <span class="icon-wrapper">
                    <img src="{{ Voyager::image('icons/search.svg') }}" />
                </span>
            </a>
            <a class="text-dark px-1" href="{{ route('web.locales.update','zh_TW') }}">中文</a>
            /
            <a class="text-dark px-1" href="{{ route('web.locales.update','en') }}">EN</a>
        </div>
        <div class="d-lg-none invisible">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent$"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <a class="navbar-brand mx-0 mb-4 mb-lg-2 py-0 w-16-vh" href="/">
            <img src="{{ Voyager::image('logos/brand.svg') }}" class="img-fluid" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                @php
                    $items = $items->translate($options->locale)
                @endphp
                @foreach($items as $i=> $menu_item)
                <li
                    class="nav-item mx-lg-2 my-0 w-100 text-center {{ strpos(request()->url(), $menu_item->link())?'show':'' }}">
                    @if($menu_item->children->count())
                    <a class="nav-link h4 mb-0 dropdown-toggle text-dark font-weight-bold
                        {{ strpos(request()->url(), $menu_item->link())?'active':'' }}" id="dropdown-{{$i}}"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                        {{ $menu_item->title }}
                    </a>
                    <div class="dropdown-menu vw-lg-15 pb-0 m-0 border-0 bg-xs-dark-silver bg-lg-white
                        pt-lg-3 pt-0
                        {{ strpos(request()->url(), $menu_item->link())?'show':'' }}"
                        aria-labelledby="dropdown-{{$i}}">
                        @foreach($menu_item->children->translate($options->locale) as $j => $item)
                        <a class="dropdown-item w-100 text-center text-lg-left
                            text-white bg-dark-silver fa-1x px-3 py-2
                            border-0 pb-0
                            {{ strpos(request()->url(), $item->link())?'active':'' }}"
                            href="{{ $item->link() }}">{{ $item->title }}</a>
                        @endforeach
                    </div>
                    @else
                    <a class="nav-link h4 mb-0 text-dark font-weight-bold {{ strpos(request()->url(), $menu_item->link())?'active':'' }}"
                        href="{{ $menu_item->link()??'' }}">
                        {{ $menu_item->title }}
                    </a>
                    @endif
                </li>
                @endforeach
            </ul>

            <div id="form-search-in-site" class="form-inline d-none d-lg-flex" action="{{ route('web.searchs.index')}}"
                method="get">
                <a data-toggle="modal" data-target="#searchModal" class="btn btn-default navbar-btn mr-2">
                    <span class="icon-wrapper">
                        <img src="{{ Voyager::image('icons/search.svg') }}" />
                    </span>
                </a>
                <a class="text-dark" href="{{ route('web.locales.update','zh_TW') }}">中文</a>
                /
                <a class="text-dark" href="{{ route('web.locales.update','en') }}">EN</a>
            </div>
        </div>

    </nav>
</header>
