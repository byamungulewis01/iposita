@component('mail::message',['data' =>$data])

{{$data["message"]}}

<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
