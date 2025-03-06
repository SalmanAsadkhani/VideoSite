
<div class="navbar-right">
    <ul class="navbar-right__menu">
        <li class="nav-search">
            <a href="#" class="search-toggle">
                <i class="uil uil-search"></i>
                <i class="uil uil-times"></i>
            </a>
            <form action="/" class="search-form-topMenu">
                <span class="search-icon uil uil-search"></span>
                <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="جستجو..." aria-label="Search">
            </form>
        </li>




        <li class="nav-author">
            <div class="dropdown-custom">
                <a href="javascript:;" class="nav-item-toggle"><img src="{{auth()->user()->gravatar}}" alt="" class="rounded-circle">
                    <span class="nav-item__title"> {{auth()->user()->name}} <i class="las la-angle-down nav-item__arrow"></i></span>
                </a>
                <div class="dropdown-parent-wrapper">
                    <div class="dropdown-wrapper">
                        <div class="nav-author__options">

                            <a href="{{route('logout')}}" class="nav-author__signout">
                                <i class="uil uil-sign-out-alt"></i> خروج</a>
                        </div>
                    </div>
                    <!-- ends: .dropdown-wrapper -->
                </div>
            </div>
        </li>

        <!-- ends: .nav-author -->
    </ul>

    <!-- ends: .navbar-right__menu -->
    <div class="navbar-right__mobileAction d-md-none">
        <a href="#" class="btn-search">
            <img src="img/svg/search.svg" alt="search" class="svg feather-search">
            <img src="img/svg/x.svg" alt="x" class="svg feather-x"></a>
        <a href="#" class="btn-author-action">
            <img class="svg" src="img/svg/more-vertical.svg" alt="more-vertical"></a>
    </div>
</div>

