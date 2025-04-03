@extends('layout')
@section('content')

    <div class="container  mt-5">

        <div class="w-50 p-0 m-0 m-5">
            <x-alert/>
        </div>


        <div class="profile d-flex justify-content-start gap-5">
            <h4 class="profile-item active" data-target="profile" >
                <a class="text-light" href="{{route('profile')}}" >پروفایل</a>
            </h4>

            <h4 class="profile-item" data-target="my-videos" >
                <a class="text-light" href=" {{route('profile.my-videos')}} ">ویدیوهای من</a>
            </h4>
        </div>


        <div class="tab-content mt-5">
            <div class="row">
                <nav class="d-flex me-4  gap-4" >
                    <div class="item gap-2 "   data-target="info-form">
                        <i class="fa-solid fa-user"></i>
                        <span> اطلاعات  فردی </span>
                    </div>

                    <div class="item gap-2"  data-target="password-form">
                        <i class="fa-solid fa-lock"></i>
                        <span> رمز عبور</span>
                    </div>
                </nav>



                <!--information-->
                <form  action="{{ route('profile.update.information' , auth()->user()->id)}}" method="post" id="info-form"
                       class="d-flex flex-column  gap-2 m-5 form-content hidden-form "
                      style="max-width: 30rem"  enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex flex-column align-items-start gap-1">
                        <label for="name">نام و نام خانوادگی</label>
                        <input id="name" class="form form-control" type="text" name="name" placeholder="نام و نام خانوادگی" value="{{ auth()->user()->name }}" >

                        @error('name') <small class="alert alert-danger p-1 me-3 mb-4"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror
                    </div>

                    <div class="d-flex flex-column align-items-start gap-1" >
                        <label for="email"> ایمیل </label>
                        <input id="email" class="form form-control" type="text" name="email" placeholder="ایمیل" value="{{ auth()->user()->email }}" >

                        @error('email') <small class="alert alert-danger p-1 me-3 mb-4"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror
                    </div>

                    <div class="d-flex flex-column align-items-start gap-3" style="max-width: 20rem">
                        <label for="file"> تغییر پروفایل </label>


                        <label for="file-profile-input"
                               class="file-profile-input"
                               style="border: 2px solid #fff ;  border-radius: 0.8rem;">

                         <span class="profile-icon ">
                             <i class="fa fa-upload "></i>
                             <span>انتخاب عکس</span>
                         </span>

                            <img class="form-profile" id="form-profile" src="#" style="border-radius: 50%; width: 3rem" alt="">

                        </label>


                        <input type="file"  id="file-profile-input" name="file" class="form-control form " style="display: none ">
                        @error('file   ') <small class="alert alert-danger p-1 me-3 mb-4"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror



                    </div>

                    <button class="btn bg-danger text-light w-25 text-center   mt-3" type="submit">ذخیره کن</button>

                </form>


                <!--            reset password-->
                <form  action="{{route('profile.update.password' , auth()->user()->id)}}" method="post" id="password-form"
                       class="d-flex flex-column  gap-2 m-5 form-content hidden-form" style="max-width: 30rem ; display: none">

                    @csrf
                    <div class="d-flex flex-column align-items-start gap-1">
                        <label for="password_confirmation" > رمز جدید</label>
                        <input id="password_confirmation" class="form form-control" type="password" name="password_confirmation" placeholder="رمز جدید">

                        @error('password') <small class="alert alert-danger p-1 me-3 mb-4"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror
                    </div>

                    <div class="d-flex flex-column align-items-start gap-1" >
                        <label for="password"> تکرار رمز جدید </label>
                        <input id="password" class="form form-control" type="password" name="password" placeholder="تکرار رمز جدید">
                    </div>


                    <button class="btn bg-danger text-light w-25 text-center   mt-3" type="submit">ذخیره کن</button>

                </form>

            </div>


        </div>


        <script>

            document.getElementById("file-profile-input").addEventListener("change", function (event) {
                var file = event.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById("form-profile").src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });


            // change item
            document.addEventListener('DOMContentLoaded', function () {

                const savedItem = localStorage.getItem('selectedNavItem');

                if (savedItem) {

                    const selectedItem = document.querySelector(`.item[data-target="${savedItem}"]`);
                    if (selectedItem) {
                        selectedItem.classList.add('active');
                    }


                    const targetForm = document.getElementById(savedItem);
                    if (targetForm) {
                        targetForm.classList.remove('hidden-form');
                    }
                }

                document.querySelectorAll('.item').forEach(item => {
                    item.addEventListener('click', function () {
                        document.querySelectorAll('.item').forEach(i => i.classList.remove('active'));

                        this.classList.add('active');

                        document.querySelectorAll('.form-content').forEach(form => form.classList.add('hidden-form'));

                        const targetForm = document.getElementById(this.getAttribute('data-target'));
                        if (targetForm) {
                            targetForm.classList.remove('hidden-form');
                            localStorage.setItem('selectedNavItem', this.getAttribute('data-target'));
                        }
                    });
                });
            });


        </script>


    </div>


@endsection
