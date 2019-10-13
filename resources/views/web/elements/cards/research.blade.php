<div class="col-12 {{ $className }} mb-5 d-flex flex-column">
    <div class="mb-0 view overlay zoom">
        <a href="{{ $item->link }}">
            <img class="w-100 img-fluid object-fit-cover" src="{{ Voyager::image($item->image) }}">
            <div class="mask"></div>
        </a>
    </div>
    <!-- Post title -->
    <div class="px-3 pt-3 d-flex flex-column flex-grow bg-silver ">
        <h4 class="text-center font-weight-bold mb-3 ">
            {{ $item->title }}
        </h4>
        <div class="text-left mb-3">{!! $item->abstract !!}</div>
        <div class=" mb-4 mt-auto text-center">
            <a class="btn btn-success font-weight-bold border-radius-3x px-4"
                href="{{ $item->link }}">
                Read more
            </a>
        </div>
    </div>
</div>