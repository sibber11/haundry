@component('mail::message')
# Introduction

You are Invited to register.

Click the Register button to register.
@component('mail::button', ['url' => $route])
    Register
@endcomponent
If you are having problem clicking the button, copy the link below to sign up.

{{$route}}

Thanks,<br>
{{config('app.name') }}
@endcomponent
