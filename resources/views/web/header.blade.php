<header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="{{ Voyager::image('logos/brand.svg') }}" />
        </a>
        <div class="collapse navbar-collapse justify-content-center align-items-end flex-column" id="navbarNav">
            <div class="navbar-nav flex-row locale-wrapper">
                EN / 中
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav">
                {{-- {{ dd(\Request::url()) }} --}}
                @foreach($items as $menu_item)
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown-{{ $menu_item->title }}"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        href="#">
                        {{ $menu_item->title }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown-{{ $menu_item->title }}">
                        <a class="dropdown-item" href="#">Action</a>
                    </div>
                </li>
                @endforeach
                <form class="form-inline">
                    <div class="input-group has-search">
                        <input type="text" class="form-control" aria-describedby="basic-addon1">
                        {{-- <span class="fa fa-search "></span> --}}
                        <span class="icon-wrapper">
                            <img src="{{ Voyager::image('icons/search.svg') }}" />
                        </span>
                    </div>
                </form>
            </ul>
        </div>

    </nav>
</header>