<!DOCTYPE html>
{{--<html>--}}

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="keywords" content="Blog website templates" />--}}
{{--    <meta name="description" content="Author - Personal Blog Wordpress Template">--}}
{{--    <meta name="author" content="Rabie Elkheir">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}

{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>Video Post – Video Sharing HTML Template</title>--}}


{{--    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"--}}
{{--        type="text/css" />--}}
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Raleway:400,500,700|Roboto:300,400,500,700,900|Ubuntu:300,300i,400,400i,500,500i,700"--}}
{{--        rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/main.css') }}">--}}

{{--    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />--}}

{{--    <!--[if lt IE 9]>--}}
{{--            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
{{--            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}
{{--        <![endif]-->--}}





{{--</head>--}}

{{--<body>--}}
{{--    <!--======= header =======-->--}}
{{--    <header>--}}
{{--        <div class="container-full">--}}
{{--            <div class="row">--}}

{{--                --}}{{--logo--}}
{{--                <div class="col-lg-2 col-md-2 col-sm-12">--}}
{{--                    <a id="main-category-toggler" class="hidden-md hidden-lg hidden-md" href="#">--}}
{{--                        <i class="fa fa-navicon"></i>--}}
{{--                    </a>--}}
{{--                    <a id="main-category-toggler-close" class="hidden-md hidden-lg hidden-md" href="#">--}}
{{--                        <i class="fa fa-close"></i>--}}
{{--                    </a>--}}
{{--                    <div id="logo">--}}
{{--                        <a href="{{route("index")}}"><img src="{{asset('img/logo.png')}}" alt=""></a>--}}
{{--                    </div>--}}
{{--                </div><!-- // col-md-2 -->--}}

{{--                --}}{{--search--}}
{{--                <div class="col-lg-3 col-md-3 col-sm-6 hidden-xs hidden-sm">--}}
{{--                    <div class="search-form">--}}
{{--                        <form id="search" action="#" method="get">--}}
{{--                            <input type="text"   value="{{request()->query('q')}}"  name="q" placeholder="جستجو ..." />--}}
{{--                            <input type="submit" value="Keywords" />--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div><!-- // col-md-3 -->--}}

{{--                <div class="col-lg-3 col-md-3 col-sm-5 hidden-xs hidden-sm">--}}
{{--                </div><!-- // col-md-4 -->--}}
{{--                <div class="col-lg-2 col-md-2 col-sm-4 hidden-xs hidden-sm"><!--  -->--}}
{{--                </div>--}}

{{--                --}}{{--profile--}}
{{--                @auth()--}}
{{--                <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs hidden-sm">--}}
{{--                    <div class="dropdown">--}}
{{--                        <a data-toggle="dropdown" href="#" class="user-area">--}}
{{--                            <div class="thumb"><img--}}
{{--                                    src="{{auth()->user()->gravatar}}" alt="">--}}
{{--                            </div>--}}
{{--                            <h2>{{auth()->user()->name}}</h2>--}}
{{--                            <h3>25 اشتراک</h3>--}}
{{--                            <i class="fa fa-angle-down"></i>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu account-menu  ">--}}
{{--                            <li><a href="#"><i class="fa fa-edit color-1"></i>ویرایش پروفایل</a></li>--}}

{{--                            <li><a href="{{route("videos.create")}}"><i class="fa fa-video-camera color-2"></i>اضافه کردن فیلم</a></li>--}}

{{--                            <li><a href="#"><i class="fa fa-star color-3"></i>برگزیده</a></li>--}}

{{--                                @if( auth()->user()->role == 'admin' )--}}
{{--                                    <li><a href="{{route('panel.home')}}"> <i class="fa fa-cogs  color-1"></i>پنل مدیریت   </a></li>--}}
{{--                                @endif--}}

{{--                            <li><a href="{{route("logout")}}"><i class="fa fa-sign-out color-4"></i>خروج</a></li>--}}
{{--                        </ul>--}}

{{--                </div>--}}

{{--                @endauth--}}

{{--                @guest()--}}

{{--                    <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs hidden-sm">--}}
{{--                           <a href="{{route("login.create")}}" class="btn btn-danger">ورود</a>--}}
{{--                           <a href="{{route("register.create")}}" class="btn btn-danger">ثبت نام </a>--}}
{{--                    </div>--}}

{{--                @endguest--}}

{{--            </div><!-- // row -->--}}
{{--        </div><!-- // container-full -->--}}
{{--    </header><!-- // header -->--}}

{{--    <x-header-menu />--}}



{{--    <div class="site-output">--}}

{{--        @if (session('alert'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ session('alert') }}--}}
{{--            </div>--}}

{{--        @endif--}}

{{--        <div id="all-output" class="col-md-12">--}}

{{--            <form class="mt-5" action="#" method="get">--}}
{{--                <div class="row">--}}

{{--                    <div class="form-group col-md-3">--}}
{{--                        <label class="inputCity" >ترتیب بر اساس</label>--}}

{{--                        <select class="form-control" name="sortBy" >--}}
{{--                            <option {{request()->query('length') ===  'created_at'  ? 'selected' : ''}}   value="created_at"  >جدید ترین</option>--}}
{{--                            <option {{request()->query('length') ===  'like'  ? 'selected' : ''}}    value="like" >محبوب ترین</option>--}}
{{--                            <option {{request()->query('length') ===  'length'   ? 'selected' : ''}}   value="length"  >مدت زمان ویدیو</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="form-group col-md-3">--}}
{{--                        <label class="inputState" >مدت زمان</label>--}}

{{--                        <select id="inputState" class="form-control" name="length">--}}
{{--                            <option {{request()->query('length') === null  ? 'selected' : ''}}  value="" >همه </option>--}}
{{--                            <option {{request()->query('length') === 1  ? 'selected' : ''}}    value="1">کمتر از یک دقیقه</option>--}}
{{--                            <option {{request()->query('length') === 2  ? 'selected' : ''}}   value="2">تا 5 دقیقه</option>--}}
{{--                            <option {{request()->query('length') === 3   ? 'selected' : ''}}   value="3">بیشتر از 5 دقیقه</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <input type="hidden" name="q" value="{{request()->query('q')}}" >--}}

{{--                    <div class="form-group col-md-3"  style="margin-top: 29px">--}}
{{--                        <button type="submit" class="btn btn-primary">فیلتر</button>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </form>--}}

{{--            @yield('content')--}}
{{--        </div><!-- // row -->--}}

{{--    </div>--}}

{{--    <script src="{{ asset('js/main.js') }}"></script>--}}
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

{{--</body>--}}

{{--</html>--}}













<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Video Online </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark px-3 mb-3 " dir="rtl">
    <div class="container-fluid w-75 justify-content-center mt-3">
        <div class="d-flex gap-3 ">

            <a class="navbar-brand fw-bold" href="{{ route('index')  }}">
                <img src=" {{ asset('img/logo.png')}} " alt="logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto d-flex gap-2  ">


                    <li class="nav-item ms-2 ">
                        <a class="nav-link" href="#"  role="button" data-bs-toggle="dropdown">
                            ویدیوهای جدید
                        </a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="#"  role="button" data-bs-toggle="dropdown">
                            ویدیوهای پرطرفدار
                        </a>

                    </li>


                </ul>

            </div>

        </div>


        <div class="d-flex  gap-3">

            <form class="d-flex me-3" id="search" action="#" method="get">
                <input class="form-control search-box me-2" type="search" name="q" placeholder="جستجو ..." aria-label="Search">
                <input type="submit" value="Keywords" hidden="hidden" />
            </form>


            @auth()
                 <div class="sidebar">
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center gap-2 text-white" data-bs-toggle="dropdown" href="#">
                        <img src="https://www.gravatar.com/avatar/94e459431e3d23f72ae2a0c541863530" class="profile-img" alt="profile-Image">
                        <h6 class="ms-2"> {{auth()->user()->name }} </h6>
                    </a>


                    <ul class="dropdown-menu dropdown-menu-dark text-end">


                        <li class="profile-container">

                            <div class="position-relative d-inline-block">
                                <img id="profilePic" src="https://www.gravatar.com/avatar/94e459431e3d23f72ae2a0c541863530" style="border-radius: 50%; width: 5rem" alt="profile-logo">

                                <label for="fileInput">
                                    <span class="camera-icon">
                                        <i class="fas fa-camera"></i>
                                    </span>
                                </label>

                                <input type="file" id="fileInput" accept="image/*">

                            </div>
                            <h6 class="mt-4 text-lighter"> {{auth()->user()->name}} </h6>
                        </li>



                        <li class=" menu-item  dropdown-item">
                            <a href="#" > <i class="fas fa-user"></i> تغییر حساب  کاربری شما </a>
                        </li>


                        <div class="border-show"></div>

                        <li class="menu-item dropdown-item">
                            <a href="#"> <i class="fa fa-comments"></i> نظرات من</a>
                        </li>

                        <div class="border-show"></div>

                        <li class="menu-item dropdown-item">
                            <a href="#"><i class="fa fa-bookmark"></i> نشان شده ها </a>
                        </li>

                        <div class="border-show"></div>

                        <li class="logout dropdown-item">
                            <a href=" {{route('logout')}} ">  <i class="fas fa-sign-out-alt"></i> خروج از حساب کاربری</a>
                        </li>

                    </ul>
                </div>
            </div>
            @endauth


            @guest()
                <div class="gap-4 d-flex">
                    <a href="#" class="btn btn-outline-light">ورود</a>
                    <a href="#" class="btn btn-primary">ثبت نام</a>
                </div>
            @endguest

        </div>
    </div>

</nav>



@yield('content')




<script src="{{ asset('js/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            1200: { slidesPerView: 4 },
            992: { slidesPerView: 3 },
            768: { slidesPerView: 2 },
            576: { slidesPerView: 1 },
        }
    });
</script>

</body>
</html>

