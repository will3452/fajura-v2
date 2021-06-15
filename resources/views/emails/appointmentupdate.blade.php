@component('mail::message')
# Booked appointment status update!

Your Booked Appointment was {{ $update }}

@component('mail::button', ['url' => ''])
Go to App
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
