@component('mail::message')
    Manager: {{ $myMessage['manager'] }} <br>
    Company: {{ $myMessage['company'] }} <br>
    Response: {{ $myMessage['response'] }} <br>
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
