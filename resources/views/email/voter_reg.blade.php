<p>Hello, {{ $voter->name }}</p>
<p>You have been registered to participate in the poll <b>{{ $voter->poll->name }}</b>
    taking place from {{ $voter->poll->start_date->format('d F Y H:i a') }} to
    {{ $voter->poll->end_date->format('d F Y H:i a') }}.</p>
<p>
    To participate in this poll by casting your ballot, use the following link:
    <a href="{{ route('web.polls.show', ['slug' => $voter->poll->slug, 'token' => $voter->token]) }}">
        {{ route('web.polls.show', ['slug' => $voter->poll->slug, 'token' => $voter->token]) }}</a>
</p>
<p>Please do not share your voters link and you can only vote once.</p>
<p>Thank you.</p>