@extends('layout')
@section('content')


    {{--            ویدیوهایی پیشنهادی--}}
<div class="container mt-5">
    <div class="d-flex justify-content-start mb-3 mb-4">
        <div class="text-end">
            <h5 class="title-color">ویدیوهای پیشنهادی</h5>
        </div>
    </div>

    <div class="movies d-flex  flex-wrap justify-content-around align-items-center gap-3">
        @foreach($RecommendedVideos as $video)
            <x-video-box  :video="$video" />



        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href="{{route('videos.recommended')}} " class="btn btn-view-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l7 -7M8 12l7 7"/>
            </svg>
            مشاهده همه
        </a>
    </div>
</div>



{{--محبوب ترین ویدیو ها--}}

<div class="container mt-5">
    <div class="d-flex justify-content-start mb-3 mb-4">
        <div class="text-end">
            <h5 class="title-color">محبوب ترین ویدیو ها</h5>
        </div>
    </div>

    <div class="movies d-flex  flex-wrap justify-content-around align-items-center gap-3">
        @foreach($topVideos as $video)

            <x-video-box  :video="$video"/>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href=" {{route('videos.popular')}} " class="btn btn-view-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l7 -7M8 12l7 7"/>
            </svg>
            مشاهده همه
        </a>
    </div>
</div>

{{--    <div class="container mt-5">--}}
{{--        @foreach($videos as $video)--}}
{{--            @dd($video)--}}
{{--                <x-video-box  :video="$video"/>--}}
{{--        @endforeach--}}
{{--    </div>--}}






{{--            جدید ترین ویدیو ها--}}
<div class="container mt-5">
    <div class="d-flex justify-content-start mb-3 mb-4">
        <div class="text-end">
            <h5 class="title-color">جدیدترین ویدیوها</h5>
        </div>
    </div>

    <div class="movies d-flex  flex-wrap justify-content-around align-items-center gap-3">
        @foreach($LatestVideos as $video)
            <x-video-box  :video="$video"/>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href="  {{route('videos.latest')}}  " class="btn btn-view-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l7 -7M8 12l7 7"/>
            </svg>
            مشاهده همه
        </a>
    </div>
</div>


@endsection
