@pushonce('css:card_event')
<style>
    .event-title {
        bottom: 0;
        opacity: 0.9;
        padding: .5rem;
    }

    .zoom:hover .event {
        transform: scale(1.1);
    }

    .zoom .event {
        transition: all 4s ease;
    }
</style>
@endpushonce

<div class="h-100">
    <a href="{{ route('web.events.detail', $item->id)}}">
        <div class="object-fit-cover background-position-center background-size-cover min-vh-42 h-100 event"
            style="background-image:url({{ Voyager::image($item->image)}})">


        </div>
    </a>
    <div class="w-100 event-title p-2 position-absolute bg-white text-left p-2">
        <!-- Post title -->
        <h4 class="font-weight-bold mb-3">{{ $item->title }}</h4>
        <!-- Post data -->
        <p>{{ $item->published_from }}
            /
            <span class="text-success">{{ $item->firstCategory }}</span>
        </p>
    </div>
</div>