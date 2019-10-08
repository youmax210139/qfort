@pushonce('css:paginator')
<style>
</style>
@endpushonce
<div class="row w-100 pt-5 my-5 m-0 text-center">
    <div class="col p-0">
        <a class="btn btn-sm text-dark {{ $item->previous?'':'disabled' }} px-lg-3 py-lg-2"
            href="{{ $item->previousLink }}">
            &lt; Previous {{ $item->classBaseName }}
        </a>
    </div>
    <div class="col p-0">
        <a class="btn btn-sm btn-success px-lg-3 py-lg-2" href="{{ $item->indexLink }}">
            {{ $item->classBaseName }} Overview
        </a>
    </div>
    <div class="col p-0">
        <a class="btn btn-sm text-dark {{ $item->next?'':'disabled' }} px-lg-3 py-lg-2" href="{{ $item->nextLink }}">
            Next {{ $item->classBaseName }} &gt;
        </a>
    </div>
</div>