@push('css')
<style>
    header .nav-link.text-dark:hover {
        background-color: #000 !important;
        color: #fff !important;
    }

    header .navbar-brand img {
        height: 80px;
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
    }
</style>
@endpush
<header class="font-weight-bold fixed-top bg-white py-2">
    <nav
        class="container-lg navbar navbar-expand-lg align-items-center align-items-lg-center justify-content-lg-start justify-content-space">
        <div class="w-100 d-flex d-lg-none justify-content-end">
            <a class="icon-wrapper mr-3">
                <img src="{{ Voyager::image('icons/search.svg') }}" />
            </a>
            <a class="text-dark" href="">中文</a>
            /
            <a class="text-dark" href="">EN</a>
        </div>
        <div class="d-lg-none invisible">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent$"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <a class="navbar-brand mx-0" href="/">
            <img src="{{ Voyager::image('logos/brand.svg') }}" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-center align-items-center"
            id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
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
                        @foreach($menu_item->children as $j => $item)
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

            <form class="form-inline d-none d-lg-flex" action="{{ route('web.searchs.index')}}" method="get">
                <div class="input-group has-search mr-3">
                    <input name="search" type="text" class="form-control pl-2 vw-8" value="{{ request()->search }}"
                        aria-describedby="basic-addon1">
                    <span class="icon-wrapper">
                        <img src="{{ Voyager::image('icons/search.svg') }}" />
                    </span>
                </div>
                <a class="text-dark" href="">中文</a>
                /
                <a class="text-dark" href="">EN</a>
            </form>
        </div>

    </nav>
</header>
