@push('css')
<style>
</style>
@endpush
<div class="row w-100 py-5 m-0 text-center">
    <div class="col-4">
        <a class="btn text-dark {{ $item->previous?'':'disabled' }}" href="{{ $item->previousLink }}">
            &lt; Previous {{ $item->classBaseName }}
        </a>
    </div>
    <div class="col-4">
    <a class="btn btn-success" href="{{ $item->indexLink }}">
            {{ $item->classBaseName }} Overview
        </a>
    </div>
    <div class="col-4">
        <a class="btn text-dark {{ $item->next?'':'disabled' }}" href="{{ $item->nextLink }}">
            Next {{ $item->classBaseName }} &gt;
        </a>
    </div>
</div>