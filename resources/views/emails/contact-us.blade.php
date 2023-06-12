@component('mail::message')
    Name: {{ $myMessage['name'] }} <br>
    Email: {{ $myMessage['email'] }} <br>
    Message: {{ $myMessage['message'] }} <br>
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
