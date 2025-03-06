@extends('layout')
@section('content')

    {{--        ویدیوهایی پیشنهادی--}}
        <div class="container mt-5">

            <div class="d-flex justify-content-between mb-3 mb-4" dir="rtl">

                <div class="text-end">
                    <h5 class="title-color">ویدیوهای پیشنهادی</h5>
                </div>

                <div class=" text-start">
                    <div class="btn-group ">
                        <div class="swiper-button-prev bg-dark rounded-5 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.41 18.16L8.75 12.5l5.66-5.66l.7.71l-4.95 4.95l4.95 4.95z"/></svg>
                        </div>

                        <div class="swiper-button-next bg-dark rounded-5 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m8.59 18.16l5.66-5.66l-5.66-5.66l-.7.71l4.95 4.95l-4.95 4.95z"/></svg>
                        </div>
                    </div>
                </div>

            </div>


            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    @foreach($RecommendedVideos as $video)
                        <x-video-box  :video="$video"/>
                    @endforeach

                </div>

            </div>
            <div class="text-center mt-4 ">
                <a href="#" class="btn btn-view-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l7 -7M8 12l7 7"/></svg>
                    مشاهده همه
                </a>
            </div>
        </div>



    {{--        جدید ترین ویدیو ها--}}
        <div class="container mt-5">

            <div class="d-flex justify-content-between mb-3 mb-4" dir="rtl">

                <div class="text-end">
                    <h5 class="title-color">جدید ترین ویدیو ها </h5>
                </div>

                <div class=" text-start">
                    <div class="btn-group ">
                        <div class="swiper-button-prev bg-dark rounded-5 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.41 18.16L8.75 12.5l5.66-5.66l.7.71l-4.95 4.95l4.95 4.95z"/></svg>
                        </div>

                        <div class="swiper-button-next bg-dark rounded-5 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m8.59 18.16l5.66-5.66l-5.66-5.66l-.7.71l4.95 4.95l-4.95 4.95z"/></svg>
                        </div>
                    </div>
                </div>

            </div>


            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    @foreach($LatestVideos as $video)
                        <x-video-box  :video="$video"/>
                    @endforeach

                </div>

            </div>
            <div class="text-center mt-4 ">
                <a href="#" class="btn btn-view-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l7 -7M8 12l7 7"/></svg>
                    مشاهده همه
                </a>
            </div>
        </div>

        <div class="container mt-5">

            <div class="d-flex justify-content-between mb-3 mb-4" dir="rtl">

                <div class="text-end">
                    <h5 class="title-color">محبوب ترین ویدیو ها </h5>
                </div>

                <div class=" text-start">
                    <div class="btn-group ">
                        <div class="swiper-button-prev bg-dark rounded-5 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.41 18.16L8.75 12.5l5.66-5.66l.7.71l-4.95 4.95l4.95 4.95z"/></svg>
                        </div>

                        <div class="swiper-button-next bg-dark rounded-5 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m8.59 18.16l5.66-5.66l-5.66-5.66l-.7.71l4.95 4.95l-4.95 4.95z"/></svg>
                        </div>
                    </div>
                </div>

            </div>


            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    @foreach($popularVideos as $video)
                        <x-video-box  :video="$video"/>
                    @endforeach

                </div>

            </div>
            <div class="text-center mt-4 ">
                <a href="#" class="btn btn-view-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l7 -7M8 12l7 7"/></svg>
                    مشاهده همه
                </a>
            </div>
        </div>



@endsection
