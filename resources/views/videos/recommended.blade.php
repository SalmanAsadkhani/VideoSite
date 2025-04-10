@extends('layout')
@section('content')

    <div class="container mt-5">
    <div class="d-flex justify-content-start mb-3 mb-4">
        <div class="text-end">
            <h5 class="title-color">ویدیوهای پیشنهادی</h5>
        </div>
    </div>

    <div class="movies d-flex  flex-wrap justify-content-around align-items-center gap-3">

            @if($videos->count())
                @foreach($videos as $video)
                    <x-video-box  :video="$video"/>
                @endforeach

            @else
                <div class="text-warning "> هیچ ویدیویی مطابق با جستجوی شما یافت نشد</div>
                <span><a class="text-danger" href="{{route('index')}}">بازگشت به صفحه اصلی</a></span>
            @endif

            <div class="text-center" dir="ltr">
                {{ $videos->links() }}
            </div>
    </div>

    <div class="text-center mt-4">

</div>
@endsection
