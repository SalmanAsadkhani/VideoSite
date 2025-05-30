
@extends("auth-layout")
@section('content')

    <div class="container row d-flex justify-content-center mt-5 bg-dark p-3" style="max-width:40rem ; margin: auto; border-radius: 1rem ">
        <div class="login-header d-flex justify-content-between align-items-center mt-2 w-100 ">
            <a href="{{route('index')}}"><img src=" {{asset('img/logo.png')}} " alt="logo"></a>
            <a class="text-lighter">
                <h6> ثبت نام</h6>
            </a>
        </div>

        <div class="border-form"></div>

        <form class="row d-flex justify-content-center" action="{{ route('register.store')}}" method="post">
            @csrf

            <div class="form-group ">
                @error('name') <small class="alert alert-danger p-1 me-3 mt-4"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror

                <label for="name" class="w-100 col-form-label me-2">
                    <input id="name" class="form-control form-login" placeholder="نام خود را وارد کنید" type="text" value="{{old('name')}}"  name="name">
                </label>
            </div>


            <div class="form-group ">
                @error('email') <small class="alert alert-danger p-1 me-3 mt-4"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror

                <label for="email" class="w-100 col-form-label me-2">
                    <input id="email" class="form-control form-login" placeholder="ایمیل خود را وارد کنید" type="email"  value="{{old('email')}}"  name="email">
                </label>
            </div>


            <div class="form-group ">
                @error('password') <small class="alert alert-danger p-1 me-3 mt-4"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror

                <label for="password_confirmation" class="w-100 col-form-label me-2">
                    <input id="password_confirmation" class="form-control form-login" placeholder="رمز عبور خود را وارد کنید"
                           type="password"
                           name="password_confirmation">
                </label>
            </div>
            <div class="form-group ">


                <label for="password" class="w-100 col-form-label me-2">
                    <input id="password" class="form-control form-login" placeholder="رمز عبور خود را تکرار کنید "
                           type="password"
                           name="password">
                </label>
            </div>


            <div class="form-group d-flex gap-2">
                <label  class="control-label me-3 "> جنسیت: </label>
                <input type="radio" id="MAN" checked name="sex" value="MAN">
                <label for="MAN">مرد</label>
                <input type="radio" id="FEMALE" name="sex" value="FEMALE">
                <label for="FEMALE">زن</label>
            </div>

            <button class="btn bg-danger text-light w-75 text-center  mt-4" type="submit">ورود</button>

            <p class="mt-4">شما یک حساب کاربری دارید؟ <a class="text-red" href=" {{route('login.create')}} "> ورود! </a> </p>
        </form>
    </div>


@endsection
