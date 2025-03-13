@component('mail::message')
    # New Email Sent

    A new email has been sent.

    @if ($save->subject)
        **Subject:** {{ $save->subject }}
    @endif

    @if ($save->message)
        **Message:**
        {{ $save->message }}
    @endif

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
