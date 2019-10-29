@pushonce('css:card_events_events')
<style>
    .card-body .position-absolute {
        left: auto !important;
        bottom: auto !important;
    }
</style>
@endpushonce

<div class="card border-0 mb-5" data-aos="fade-in">
    <div class="mb-0 view overlay zoom {{ $imgClassName??'' }}">
        <a href="{{ $item->link }}">
            <img class="w-100 h-100 card-img-top object-fit-cover" src="{{ Voyager::image($item->image) }}">
            <div class="mask"></div>
        </a>
    </div>
    <div class="card-body pt-0 border-dark-silver border flex-column text-left border-bottom-0 border-top-0 pb-0">
        <div class="position-absolute bg-gray text-white date text-center w-6-vh vh-6
        d-flex align-items-center justify-content-center">
            {{ $item->publish_date['from']->format('M') }}<br>
            {{ $item->publish_date['from']->format('d') }}
        </div>
        <!-- Post title -->
        <a class="text-dark" href="{{ $item->link }}">
            <h4 class="mt-5 font-weight-bold mb-3
                max-vh-lg-6 min-vh-lg-6 card_title">
                {{ $item->title }}
            </h4>
        </a>
        <!-- Excerpt -->
        <div class="mb-3 card_abstract">{!! $item->abstract !!}</div>
    </div>
    <div class="card-footer text-right bg-white border border-dark-silver border-top-0 pt-0">
        <a class="btn text-success font-weight-bold" href="{{ route('web.events.detail', [$item->id])}}">
            Read more
        </a>
    </div>
</div>
