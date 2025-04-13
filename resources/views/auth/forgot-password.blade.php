@extends('auth-layout')
@section('content')


    <div class="container row d-flex justify-content-center mt-5 bg-dark p-4" style="max-width:40rem ; margin: auto; border-radius: 1rem ">
        <div class="login-header d-flex justify-content-between align-items-center w-100 ">
            <a href="{{route('index')}}"><img src=" {{asset('img/logo.png')}} " alt="logo"></a>
            <h6 class="text-lighter">بازیابی رمز عبور</h6>
        </div>


        <div class="border-form"></div>

        <form class="row d-flex justify-content-center" action="{{route('password.email')}}" method="post">
            @csrf

            <div class="form-group">
                @error('email') <small class="alert alert-danger p-1 me-3 mb-4"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror

                <label for="email" class="w-100 col-form-label me-2">
                    <input id="email" class="form-control form-login" placeholder="ایمیل خود را وارد کنید" type="email"  name="email">
                </label>
            </div>


            <button class="btn bg-danger text-light w-75 text-center  mt-3" type="submit">ارسال ایمیل بازیابی</button>

        </form>
    </div>

@endsection
