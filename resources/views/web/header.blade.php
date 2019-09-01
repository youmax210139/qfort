@push('css')
<style>
    header {
        background-color: #fff;
    }

    header .navbar-brand img {
        height: 80px;
    }

    header .nav-link {
        font-family: 'open_sanssemibold';
        color: #000 !important;
    }

    header .nav-link:hover,
    header .nav-link.active {
        background-color: #000 !important;
        color: #fff !important;
    }

    header .dropdown-item:hover,
    .dropdown-item.active {
        background-color: #000 !important;
        color: #fff;
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

    @media (min-width: 768px) {

        header {
            padding: 0 20px;
        }

        header .has-search input {
            min-width: 240px;
        }

        header .dropdown-menu {
            top: auto;
            left: auto;
            border: none;
            border-radius: 0px;
            padding-bottom: 0px;
        }

        header .dropdown-menu.show {
            display: none;
        }

        header .dropdown-menu .dropdown-item {
            background: #BDBEBF;
            color: #fff;
            text-align: left;
            letter-spacing: 0.9px;
        }

        header .dropdown-menu .dropdown-item:first-child {
            padding-top: 0.75rem;
        }

        header .dropdown-menu .dropdown-item:last-child {
            padding-bottom: 0.75rem;
        }

        header .navbar-nav li:hover>.dropdown-menu {
            display: block;
        }
    }

    @media (min-width: 1200px) {
        header {
            width: 100%;
        }

        header .navbar {
            width: 1160px;
            margin-left: auto;
            margin-right: auto;
        }
    }
</style>
@endpush
<header class="font-weight-bold fixed-top">
    <nav
        class="navbar navbar-expand-md align-items-center align-items-lg-end justify-content-lg-start justify-content-space">
        <div class="w-100 d-flex d-md-none justify-content-end">
            <span class="icon-wrapper mr-3">
                <img src="{{ Voyager::image('icons/search.svg') }}" />
            </span>
            <a class="text-dark" href="">中文</a>
            /
            <a class="text-dark" href="">EN</a>
        </div>
        <div class="d-lg-none invisible">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <a class="navbar-brand ml-lg-2 mx-0" href="/">
            <img src="{{ Voyager::image('logos/brand.svg') }}" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-center align-items-end flex-column"
            id="navbarSupportedContent">
            <div class="navbar-nav flex-row mb-2 d-none d-md-flex">
                <a class="text-dark" href="">中文</a>
                /
                <a class="text-dark" href="">EN</a>
            </div>
            <ul class="navbar-nav align-items-lg-end align-items-center">
                @foreach($items as $i=> $menu_item)
                <li
                    class="nav-item mx-2 my-0 w-100 text-center {{ strpos(request()->url(), $menu_item->link())?'show':'' }}">
                    @if($menu_item->children->count())
                    <a class="nav-link h4 mb-0 dropdown-toggle {{ strpos(request()->url(), $menu_item->link())?'active':'' }}"
                        id="dropdown-{{$i}}" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        {{ $menu_item->title }}
                    </a>
                    <div class="dropdown-menu pb-0 m-0 border-0 {{ strpos(request()->url(), $menu_item->link())?'show':'' }}"
                        aria-labelledby="dropdown-{{$i}}">
                        @foreach($menu_item->children as $item)
                        <a class="dropdown-item w-100 text-center text-md-left fa-1x p-2 {{ strpos(request()->url(), $item->link())?'active':'' }}"
                            href="{{ $item->link() }}">{{ $item->title }}</a>
                        @endforeach
                    </div>
                    @else
                    <a class="nav-link h4 mb-0 {{ strpos(request()->url(), $menu_item->link())?'active':'' }}"
                        href="{{ $menu_item->link() }}">
                        {{ $menu_item->title }}
                    </a>
                    @endif
                </li>
                @endforeach
                <form class="form-inline mb-2 ml-4 d-none d-lg-flex">
                    <div class="input-group has-search">
                        <input type="text" class="form-control pl-2" aria-describedby="basic-addon1">
                        <span class="icon-wrapper">
                            <img src="{{ Voyager::image('icons/search.svg') }}" />
                        </span>
                    </div>
                </form>
            </ul>
        </div>

    </nav>
</header>