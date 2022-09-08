@component('mail::message')
    # Introduction

    You are Invited to register.

    {{--@component('mail::button', ['url' => auth()->user()->getReferralLink()])--}}
    @component('mail::button', ['url' => $route])
        Register
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
