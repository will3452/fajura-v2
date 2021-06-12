@component('mail::message')
# Your password has been changed

new password : {{ $password }}

@component('mail::button', ['url' => route('home')])
    Goto to the app
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
