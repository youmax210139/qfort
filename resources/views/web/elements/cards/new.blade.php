<div class="col-12 {{ $className }} mb-5 d-flex flex-column">
    <div class="mb-0 view overlay zoom">
        <a href="{{ $item->link }}">
            <img class="img-fluid object-fit-cover" src="{{ Voyager::image($item->image) }}">
            <div class="mask"></div>
        </a>
    </div>
    <!-- Post title -->
    <div class="px-3 pt-3 d-flex flex-column bg-silver flex-md-grow">
        <h4 class="text-center font-weight-bold mb-3 ">
            {{ $item->title }}
        </h4>
        <p>
            {{ $item->created_at }} /
            <span class="text-success">{{ $item->firstCategory }}</span>
        </p>
        <div class="text-left mb-3">{!! $item->abstract !!}</div>
        <div class=" mb-4 mt-auto text-right">
            <a class="btn btn-success font-weight-bold border-radius-3x px-4" href="{{ $item->link }}">
                Read more
            </a>
        </div>
    </div>
</div>