


<!doctype html>
<html lang="fa-IR" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content=' {{csrf_token()}}' >
    <title>Dashboard</title>


    <link rel="icon"  href="{{asset('img/logo.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=movie_edit" />

    @include('panel-admin/partials/links-css')

    <style>
        html,body {
            font-family: Vazirmatn, sans-serif !important;
        }
    </style>

</head>

<body class="layout-light side-menu">

<div class="mobile-search">
    <form action="/" class="search-form">
        <img src="img/svg/search.svg" alt="search" class="svg">
        <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="جستجو..." aria-label="Search">
    </form>
</div>

<div class="mobile-author-actions"></div>

<header class="header-top">
    <nav class="navbar navbar-light">

        @include('panel-admin/partials/navbar-left')

        @include('panel-admin/partials/navbar-right')

    </nav>
</header>

<main class="main-content">

    <x-sidebar-wrapper />
    @yield('content')
</main>



@include('panel-admin/partials/links-js')


</body>

</html>
