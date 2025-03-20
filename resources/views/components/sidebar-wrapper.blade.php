
<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="has-child open">
                    <a href="#" class="active">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">داشبورد</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('panel.home')}}">مدیریت ویدیوها</a>
                        </li>
                        <li >
                            <a href="{{route('panel.category.videos')}}">دسته بندی ویدیوها</a>
                        </li>



                        <li class="">
                            <a href="{{route('panel.show.all')}}">مشاهده ویدیو ها</a>
                        </li>

                        <li class="">
                            <a href="{{route('panel.show.details')}}">جزییات ویدیو ها</a>
                        </li>
                        <li class="">
                            <a href="{{route('panel.video.create')}}">افزودن ویدیو</a>
                        </li>
                        <li class="">
                            <a href="{{route('panel.show.video.edit')}}">ویرایش ویدیو</a>
                        </li>


                    </ul>
                </li>



                <li class="has-child">
                    <a href="#" class="">
                        <span class="nav-icon uil uil-window-section"></span>
                        <span class="menu-text">طرح بندی ها</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class="l_sidebar">
                            <a href="#" data-layout="light">حالت روشن</a>
                        </li>

                    </ul>
                </li>


                <!-- <li class="has-child">
              <a href="#" class="">
                 <span class="nav-icon uil uil-envelope"></span>
                 <span class="menu-text">ایمیل</span>
                 <span class="toggle-icon"></span>
              </a>
              <ul>
                 <li class="">
                    <a href="inbox.html">صندوق ورودی</a>
                 </li>
                 <li class="">
                    <a href="read-email.html">خواندن ایمیل</a>
                 </li>
              </ul>
           </li> -->

                <li class="">
                    <a href="{{route('index')}}">
                        <span class="nav-icon uil uil-signin"></span>
                        <span class="menu-text">ورود</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
