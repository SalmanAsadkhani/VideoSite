@component('mail::message')
     Your Verify Email

    @component('mail::button',  ['url' => $link])
        Verify Your Email
    @endcomponent

    Thanks
    {{ config('app.name') }}
@endcomponent
