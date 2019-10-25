<div class="col-12 {{ $className }} mb-5 d-flex flex-column"  data-aos="fade-up">
    <div class="mb-0 view overlay zoom h-lg-18-vw">
        <a href="{{ $item->link }}">
            <img class="w-100 h-100 img-fluid object-fit-cover" src="{{ Voyager::image($item->image) }}">
            <div class="mask"></div>
        </a>
    </div>
    <!-- Post title -->
    <div class="px-3 pt-3 d-flex flex-column bg-silver flex-grow-1">
        <h4 class="text-center font-weight-bold mb-3
            min-vh-6 word-wrap-break">
            {{ $item->shortenTitle }}
        </h4>
        <p>
            {{ $item->created_at }} /
            <span class="text-success">{{ $item->firstCategory }}</span>
        </p>
        <div class="text-left mb-3">{!! $item->abstract !!}</div>
        <div class=" mb-4 mt-auto text-right">
            <a class="btn text-success font-weight-bold border-radius-3x px-4" href="{{ $item->link }}">
                Read more
            </a>
        </div>
    </div>
</div>
