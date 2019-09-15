@pushonce('css:card_figure')
<style>
    .image-box {
        position: relative;
        width: 100%;
    }

    .image-box:before {
        content: "";
        display: block;
        padding-top: 100%;
        /* initial ratio of 1:1*/
    }

    .image-content {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: transparent;
        color: #fff;
        line-height: 100%;
        height: 100%;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpushonce
<div class="col-lg-3 col-6 mb-5" data-aos="fade-up">
    <div class="image-box mx-auto">
        <a href="{{ route('web.peoples.detail', $item->id)}}">
            <div class="image-content">
                <div class="view overlay zoom rounded-circle w-100 h-100">
                    <img class="w-100 h-100" src="{{ Voyager::image($item->image) }}">
                    <div class="mask "></div>
                </div>
            </div>
        </a>
    </div>
    <h5 class="font-weight-bold mt-4 mb-3">
        <a class="text-dark" href="{{ route('web.peoples.detail', $item->id) }}">
            {{ $item->name }}
        </a>
    </h5>
    {{ $slot }}
</div>