@component('mail::message', ['data' =>$data])
# Hello,
<h3>{{$data['name']}}</h3>
<p>Welcome to IPOSITA</p>

Your Password is <span style="color: blue">{{$data['password']}}</span>
<p>please follow the link below to login</p>
@component('mail::button', ['url' =>url('/').'/login','color' => 'green'])
        Login
@endcomponent
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
