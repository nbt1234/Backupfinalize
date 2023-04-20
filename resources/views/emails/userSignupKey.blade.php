@component('mail::message')
Hello {{ucfirst($data['username'])}},

Please use the following passcode to complete the registration process.

@component('mail::panel')
Passcode : <b>{{$data['forget_key']}}</b>
@endcomponent

<p><b>Note :</b> This Passcode will expires 15 minutes after it was requested.</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
