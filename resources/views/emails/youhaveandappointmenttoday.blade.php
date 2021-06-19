@component('mail::message')
# Appointment Today

{{ $user->profile->sex == 'Male'? 'Mr.':'Ms.' }}{{ $user->name }} You have an appointment today at {{ App\Models\Time::MAKEREADBLE($user->appointmentsToday()[0]->start_time) }} to {{ App\Models\Time::MAKEREADBLE($user->appointmentsToday()[0]->end_time) }}.

@component('mail::button', ['url' => '/'])
    Check it out!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
