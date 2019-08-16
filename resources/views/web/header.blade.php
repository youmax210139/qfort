@push('css')

@endpush
<header class="font-weight-bold fixed-top">
    <nav
        class="navbar navbar-expand-lg align-items-center align-items-lg-end justify-content-lg-start justify-content-space">
        <div class="w-100 d-flex d-lg-none justify-content-end">
            <span class="icon-wrapper mr-3">
                <img src="{{ Voyager::image('icons/search.svg') }}" />
            </span>
            <a href="">中文</a>
            /
            <a href="">EN</a>
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
            <div class="navbar-nav flex-row mb-2 d-none d-lg-flex">
                <a href="">中文</a>
                /
                <a href="">EN</a>
            </div>
            <ul class="navbar-nav align-items-lg-end align-items-center">
                @foreach($items as $menu_item)
                <li class="nav-item mx-2 my-0">
                    @if($menu_item->children->count())
                    <a class="nav-link h4 mb-0" href="#">
                        {{ $menu_item->title }}
                    </a>
                    <div class="dropdown-menu pb-0 m-0">
                        @foreach($menu_item->children as $item)
                        <a class="dropdown-item" href="{{ $item->link() }}">{{ $item->title }}</a>
                        @endforeach
                    </div>
                    @else
                    <a class="nav-link h4 mb-0" href="{{ $menu_item->link() }}">
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