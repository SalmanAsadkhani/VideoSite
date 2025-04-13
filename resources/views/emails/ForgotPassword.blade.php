
@component('mail::message')
    # Reset Password

    @component('mail::button',  ['url' => $link])
        Reset Password
    @endcomponent

Thanks
{{ config('app.name') }}

@endcomponent

