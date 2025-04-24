<nav class="navbar navbar-expand-lg navbar-dark px-3 mb-3 " dir="rtl">
    <div class="container-fluid  nav_header mt-3 ">

        <div class="d-flex gap-3  align-items-center menu-right ">

            <a class="navbar-brand fw-bold" href="{{ route('index')  }}">
                <img src=" {{ asset('img/logo.png')}} " alt="logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="offcanvas offcanvas-start text-bg-dark" id="sidebarMenu"  style=" max-height: 20rem; max-width: 20rem; border-radius: 0 0 1rem 1rem;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">منو</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav gap-4 ">
                        <li class="nav-item"><a class="nav-link text-white" href=" {{route('videos.latest')}} ">ویدیوهای جدید</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href=" {{route('videos.popular')}} ">ویدیوهای پرطرفدار</a></li>
                    </ul>

                </div>
            </div>

        </div>

        <div class="d-flex  gap-3 me-3 menu-left">

            <span class="search_icon me-5 fs-5"><i class="fa fa-search"></i></span>

            <form class="d-flex me-3" id="search" action="#" method="get">

                <input class="form-control search-box me-2" placeholder="جستجو ..."  name="q" value="{{request( )->query('q')}}" >
{{--                <input type="hidden" name="q"  >--}}

            </form>




            @auth()
                <div class="sidebar">
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center gap-2 text-white" data-bs-toggle="dropdown" href="#">
                            <img
                                src="{{ auth()->user()->avatar ?? auth()->user()->gravatar() }}"
                                class="profile-img"
                                alt="profile"
                            />

                            <h6 class="ms-2"> {{auth()->user()->name }} </h6>
                        </a>


                        <ul class="dropdown-menu dropdown-menu-dark text-end">


                            <li class="profile-container">

                                <div class="position-relative d-inline-block">
                                    <img class="profilePic" id="profilePic" src=" {{auth()->user()->avatar}} " style="border-radius: 50%; width: 5rem" alt="profile-logo">
                                </div>
                                <h6 class="mt-4 text-lighter"> {{auth()->user()->name}} </h6>
                            </li>



                            <li class="menu-item  dropdown-item">
                                <a href=" {{route('profile')}} " > <i class="fas fa-user"></i> پروفایل </a>
                            </li>

                            <li class="menu-item dropdown-item">
                                <a href="{{route("videos.create")}}"><i class="fa fa-video-camera "></i> اضافه کردن فیلم</a>
                            </li>


                            <div class="border-show"></div>

                            <li class="menu-item dropdown-item">
                                <a href=" {{route('comments.show')}} "> <i class="fa fa-comments"></i> نظرات من</a>
                            </li>

                            <div class="border-show"></div>

                            <li class="menu-item dropdown-item">
                                <a href=" {{route('videos.favorites')}} "><i class="fa fa-heart"></i> مورد علاقه ها </a>
                            </li>

                            <div class="border-show"></div>

                            @if( auth()->user()->role == 'admin' )
                                <li class="menu-item dropdown-item">
                                    <a href="{{route('panel.home')}}"> <i class="fa fa-cogs"></i> پنل مدیریت   </a>
                                </li>
                            @endif

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
                    <a href=" {{route('login.create')}} " class="btn btn-outline-light">ورود</a>
                    <a href=" {{route('register.create')}} " class="btn btn-primary">ثبت نام</a>
                </div>
            @endguest

        </div>

    </div>

</nav>
