@if(isset($push)&& $push)
@push('css')
<style>
    .domain .bg-dark-silver {
        border-bottom-left-radius: 1.5em;
        border-bottom-right-radius: 1.5em;
        border-top-left-radius: 3em;
        border-top-right-radius: 3em;
    }

    .domain .bg-secondary{
        border-top-left-radius: 1.5em;
        border-top-right-radius: 1.5em;
    }
    .domain .bg-secondary:hover{
        background-color: rgb(35,142,141) !important;
    }
    .domain a.text-white:hover{
        background-color:inherit !important;
    }
</style>
@endpush
@endif

<div class="col-12 col-lg-4 text-white mb-5 text-white domain">
    <div class="h-100 bg-dark-silver">
        <h4 class="p-4 mb-0 bg-secondary">
            <a class="text-white" href="{{ $item->link }}">
                {{ $item->title }}
            </a>
        </h4>
        <p class="h5 p-4 mb-0">{{ $item->abstract }}</p>
    </div>
</div>