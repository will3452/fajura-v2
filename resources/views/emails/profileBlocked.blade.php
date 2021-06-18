@component('mail::message')
# Account Update

@if (!$profile->is_blocked)
Your Profile {{ $profile->user->unique_id }} has been unblocked!

@component('mail::button', ['url' => url('/')])
Go to our Website now
@endcomponent
@else 
Your Profile {{ $profile->user->unique_id }} has been blocked by the Admin.
Contact us, to resolve the issue.

@component('mail::button', ['url' => url('/#contact')])
Go to our Website now
@endcomponent
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
