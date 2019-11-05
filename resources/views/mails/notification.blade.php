<div>
    Dear Sir / Madam {{ $subscription->name }}：<br>

    News <a href="{{ $article->link }}"> {{ $article->title }} </a> <br>
    {!! $article->abstract !!}
    <br>
    <br>
    Best Regards!
</div>
