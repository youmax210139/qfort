<header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse justify-content-center align-items-end flex-column" id="navbarNav">
            <div class="navbar-nav flex-row">
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
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                            aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <span class="input-group-text amber lighten-3" id="basic-text1">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </ul>
        </div>

    </nav>
</header>