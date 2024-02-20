@component('mail::message')
# Dear {{ $user->name }},

Your Account password has been reset.
use this "{{$password}}" as password to login to your account.

@component('mail::button', ['url' => route('login')])
Login here
@endcomponent

Thanks,<br>
{{ config('app.name', 'Airtel') }}
@endcomponent
