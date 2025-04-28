

<!DOCTYPE html>
<html lang="fa" dir="rtl">

    @include('partials/header')

<body dir="rtl">


    @include('partials/navbar')


<div class=" w-75 d-flex justify-content-evenly ">
    <x-alert/>
</div>


@yield('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src="{{ asset('js/main.js') }}"></script>
    {!! ToastMagic::scripts(); !!}
</body>
</html>

