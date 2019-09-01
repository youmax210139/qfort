@push('css')
<style>
    .post .w-100.img-fluid {
        height: 20vh;
        object-fit: cover;
    }
    .post .btn{
        border-radius: .8rem;
    }
</style>
@endpush
<div class="h-100 bg-sliver position-relative post">
    <div class="mb-0 view overlay zoom">
        <a href="{{ route('web.researches.detail', $item->id)}}">
            <img class="w-100 img-fluid" src="{{ Voyager::image($item->image) }}">
            <div class="mask"></div>
        </a>
    </div>
    <div class="text-left px-3 pt-3 pb-5">
        <h4 class="text-center font-weight-bold mb-3 ">
            {{ $item->title }}
        </h4>
        <p>{!! $item->abstract !!}</p>
    </div>
    <!-- Read more button -->
    <div class="position-absolute w-100 mb-3 text-center" style="bottom:0">
        <a class="btn px-4 btn-success font-weight-bold" href="{{ $href }}">
            More
        </a>
    </div>
</div>