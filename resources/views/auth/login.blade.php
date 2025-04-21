@extends("auth-layout")
@section("content")


    <div class="container row d-flex justify-content-center mt-5 bg-dark p-4" style="max-width:40rem ; margin: auto; border-radius: 1rem ">
        <div class="login-header d-flex justify-content-between align-items-center w-100 ">
            <a href="{{route('index')}}"><img src=" {{asset('img/logo.png')}} " alt="logo"></a>
            <h5 class="text-lighter">ورود</h5>
        </div>


        <div class="border-form"></div>

        <form class="row d-flex justify-content-center" action="{{route('login.store')}}" method="post">
            @csrf

            <div class="form-group">
                @error('email') <small class="alert alert-danger p-1 me-3 mb-4"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror

                <label for="email" class="w-100 col-form-label me-2">
                    <input id="email" class="form-control form-login" placeholder="ایمیل خود را وارد کنید" type="email"  name="email">
                </label>
            </div>



            <div class="form-group ">
                @error('password') <small class="alert alert-danger p-1 me-3"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror
                <label for="password" class="w-100 col-form-label me-2">
                    <input id="password" class="form-control form-login" placeholder="رمز عبور خود را وارد کنید" type="password"  name="password">
                </label>
            </div>

           <div class="form-group">
{{--               <x-recaptcha/>--}}
               <div class="h-captcha" data-sitekey="{{config('services.recaptcha.site_key')}}"></div>
           </div>


            <div class="form-group">
                <label class="w-100 col-form-label me-3 d-flex align-items-center gap-1" >
                    <input id="remember"  type="checkbox"  name="remember" >
                    <span class="small">  مرا به خاطر بسپار </span>
                </label>
            </div>

            <p class="me-5 mt-3 small"> رمز عبور خود را فراموش کرده اید؟ <a class="text-danger" href="{{route("password.request")}}"> بازنشانی رمز عبور </a> </p>

            <button class="btn bg-danger text-light w-75 text-center  mt-3" type="submit">ورود</button>

            <p class="mt-4 me-5"> حساب کاربری ندارید؟ <a class="text-danger" href="{{route("register.create")}}"> ثبت نام </a> </p>


        </form>
    </div>


@endsection
