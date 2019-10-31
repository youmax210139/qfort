<div>
    Dear Sir / Madam {{ $guest->name }}：<br>

    We have received your application<br>
    <hr>
    Email : {{ $guest->email }}<br>
    Telephone : {{ $guest->telephone }}<br>
    <hr>
    <br>
    Welcome to join our event: <b>{{ $event->title }}</b><br>
    Event will be holding at {{ $event->published_from }}<br>
    You can check the address by this <a href="{{ $event->googleMap }}" target="_blank">link</a>.<br>
    <br>
    <br>
    We are looking forward for your coming.<br>
    Thanks.<br>
    <i>This mail is sent by Qfort System, please don't reply it.</i>
</div>
