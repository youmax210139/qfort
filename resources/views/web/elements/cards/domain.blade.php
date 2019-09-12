@pushonce('css:domain')
<style>
    .domain .bg-dark-silver {
        border-bottom-left-radius: 1.5em;
        border-bottom-right-radius: 1.5em;
    }

    .domain .bg-secondary {
        border-top-left-radius: 1.5em;
        border-top-right-radius: 1.5em;
    }

    .domain .bg-secondary:hover {
        background-color: rgb(35, 142, 141) !important;
    }

    .domain a.text-white:hover {
        background-color: inherit !important;
    }
</style>
@endpushonce

<div class="col-12 col-lg-4 text-white mb-5 text-white domain">
    <div class="bg-secondary h-30 p-4 d-flex align-items-center justify-content-center">
        <a class="text-white h4" href="{{ $item->link }}">
            {!!  preg_replace('/ /', '<br>', $item->title, 1) !!}
        </a>
    </div>
    <div class="bg-dark-silver d-flex flex-column h-70">
        <p class="h5 p-4 mb-0">{{ $item->abstract }}</p>
    </div>
</div>