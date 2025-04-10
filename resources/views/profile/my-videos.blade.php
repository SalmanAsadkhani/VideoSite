@extends('layout')
@section('content')

    <div class="container justify-content-center mt-5">

        <div class="profile d-flex justify-content-start gap-5">
            <a  class="profile-item text-light  fs-4 active"  href="{{route('profile')}}"  data-target="profile" >
                <span>پروفایل</span>
            </a>

            <a class="profile-item text-light   fs-4 "  href=" {{route('profile.my-videos')}}" data-target="my-videos" >
                <span   >ویدیوهای من</span>
            </a>

        </div>


        <div class="movies d-flex  flex-wrap justify-content-around align-items-center mt-5 gap-3">
            @if($videos->count())
                @foreach($videos as $video)

                    <x-video-box  :video="$video"/>
                @endforeach
            @else
                <div class="text-warning "> هیچ ویدیویی مطابق با جستجوی شما یافت نشد</div>
                <span><a class="text-danger" href="{{route('index')}}">بازگشت به صفحه اصلی</a></span>
            @endif
        </div>

        <div class="d-flex justify-content-center mt-5" dir="ltr">
            <div class="small">
                {{$videos->links()}}
            </div>
        </div>


        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let activeTab = localStorage.getItem("activeTab");

                if (activeTab) {
                    document.querySelectorAll(".profile-item").forEach(item => {
                        if (item.getAttribute("data-target") === activeTab) {
                            item.classList.add("active");
                        } else {
                            item.classList.remove("active");
                        }
                    });
                }

                document.querySelectorAll(".profile-item").forEach(item => {
                    item.addEventListener("click", function () {
                        localStorage.setItem("activeTab", this.getAttribute("data-target"));
                    });
                });
            });
        </script>

    </div>




@endsection()
