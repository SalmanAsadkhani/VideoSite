@extends('layout')
@section('content')

<div class="container p-0 mb-5" style="max-width: 60rem" dir="rtl">

    <div class="watch" id="watch" dir="rtl" >
        <div class="video-code  mt-5">
            <video controls preload="auto" width="100%" height="100%">
                <source src="{{ $video->video_url }}" type="video/mp4">
            </video>
        </div>
    </div>

    <div class=" row">

        <div class="d-flex justify-content-between align-items-center">
            <div class="row gap-2" style=" max-width: 46.1rem; line-height: 1.5rem;">
                <h6 class="text-blue me-2 mt-3"> {{$video->name}} </h6>
                <div class="owner d-flex align-items-center gap-1 align-self-center">
                    <img src="https://www.gravatar.com/avatar/94e459431e3d23f72ae2a0c541863530" alt="">
                    <p class="m-0 text-red"> {{$video->user->name}} </p>
                </div>
            </div>

            <div class="group-item text-center">


                <a href="{{ $video->video_downloader}}"  class="btn btn-download">
                    <i class="fa fa-download" aria-hidden="true"></i>
                    <span>دانلود</span>
                </a>

            </div>
        </div>


        <div class="d-flex justify-content-between align-items-center">

            <div class="user-point ">

                <div class="d-flex flex-row-reverse  mt-2">

                    @for($i = 5; $i >= 1; $i--)
                        
                        <a class="rate-star text-lighter" data-rating="{{ $i }}">
                            <i class="{{ $video->rating >= $i ? 'fa-solid fa-star' : ($video->rating >= $i - 0.5 ? 'fa-solid fa-star-half-stroke' : 'fa-regular fa-star') }}"
                               style="color: #ffc107;"></i> {{ $i }}
                        </a>

                    @endfor

                </div>

                <div class="point">
                    <span class="text-light small">5/</span>
                    <span class="video-rating"> {{ number_format($video->rating) }} </span>
                </div>


                <div>
                    <span>امتیاز </span> <span class="text-red">کاربران</span>
                </div>
            </div>

            <div class="group-item text-center">

                <div class="likes">

                    <div class="dislike row text-center ">
                        <a href="  {{route('dislike.store' , ['likeable_type' => 'video' , 'likeable_id' => $video ])}}  ">
                            <i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i>
                        </a>
                        <span> {{$video->dis_like_Count}} </span>
                    </div>



                    <div class="like row text-center ">
                        <a href=" {{route('like.store' , ['likeable_type' => 'video' , 'likeable_id' => $video ])}}  ">
                            <i class="fa fa-thumbs-up fa-lg " aria-hidden="true"></i>
                        </a>
                        <span>{{$video->like_count}} </span>
                    </div>





                </div>

            </div>
        </div>

    </div>


    <div class="glow-border"></div>





{{--        show videos--}}
    <div class="d-flex justify-content-around align-items-center mt-5 ">
        <div class='d-flex gap-1'>
            <svg class="text-red" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M11 11V2H2v9m2-2V4h5v5m11-2.5C20 7.9 18.9 9 17.5 9S15 7.9 15 6.5S16.11 4 17.5 4S20 5.11 20 6.5M6.5 14L2 22h9m-3.42-2H5.42l1.08-1.92M22 6.5C22 4 20 2 17.5 2S13 4 13 6.5s2 4.5 4.5 4.5S22 9 22 6.5M19 17v-3h-2v3h-3v2h3v3h2v-3h3v-2Z"/></svg>
            <p class="fw-bold">دسته بندی :<span class="small fw-normal text-blue "> {{ $video->category->name }} </span> </p>
        </div>

        <div class="d-flex gap-1">
            <svg class="text-red" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 20c4.4 0 8-3.6 8-8s-3.6-8-8-8s-8 3.6-8 8s3.6 8 8 8m0-18c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12S6.5 2 12 2m5 11.9l-.7 1.3l-5.3-2.9V7h1.5v4.4z" />
            </svg>
            <p class="fw-bold">مدت زمان :<span class="small  fw-normal text-blue ">  {{ $video->lengthInHuman }}  </span> </p>
        </div>

        <div class="d-flex gap-1">
            <svg  class="text-red" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M9 10H7v2h2zm4 0h-2v2h2zm4 0h-2v2h2zm2-7h-1V1h-2v2H8V1H6v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m0 16H5V8h14z" />
            </svg>
            <p class="fw-bold">سال پخش :<span class="small fw-normal text-blue "> 2025 </span> </p>
        </div>

    </div>

    <div class="glow-border"></div>

    <div class="description text-end mt-4">
        <h5 style="color: #CC2222">درباره این ویدیو</h5>
        <p class="text-blue">
          {{$video->desctiption}}
        </p>
    </div>

    <div class="glow-border"></div>

    <div class="comments">
        <h5 class="text-red"> نظرات کاربران</h5>

        @guest()
            <!--        quest-->
            <div class="d-flex  gap-1 justify-content-center align-items-center ">
                <i class="fa fa-exclamation-triangle text-red  fa-lg" aria-hidden="true" ></i>
                <p class="p-0 m-0 small">کاربر گرامی برای انتشار نظر خود باید وارد سامانه ی ما شده باشید.</p>
            </div>

            <div class="gap-4 d-flex justify-content-center mt-3">
                <a href="#" class="btn btn-outline-light">ورود</a>
                <a href="#" class="btn btn-primary">ثبت نام</a>
            </div>

        @endguest

        @auth()
            <!--            insert comment-->
            @can('create' , [\App\Models\Comment::class , $video])
            <form  class="d-flex mt-4 position-relative " style="height: 2.8rem;" method="post" action="{{route("comments.store" ,$video)}}">
                @csrf
                <label for="comment"></label><textarea class="send-comment" name="comment"   id="comment" placeholder="دیدگاهتان را بنویسید ..." required></textarea>
                <button  class="btn-submit">انتشار</button>
            </form>
            @endcan

        @endauth


        {{--sort--}}
        <div  class="d-flex flex-wrap  gap-2 justify-content-around align-items-center mt-5">

            <div>
                <h5> مرتب سازی:</h5>
            </div>

            <button class="btn-sort btn-new  ">
                <a> جدیدترین </a>
            </button>

            <button  class="btn-sort btn-old" href="#">
                <a> قدیمی ترین </a>
            </button>

            <button class="btn-sort btn-reaction" href="#">
                <a> بیشترین واکنش </a>
            </button>


        </div>



        <!--        comment-->
        <div class="comments">

            @foreach($video->comments as $comment)
                <div class="d-flex justify-content-between align-items-center mt-5 item-comment">

                    <div class="row gap-2 " style=" max-width: 46.1rem; line-height: 1.5rem;">

                        <div class="owner d-flex align-items-center gap-1 align-self-center">
                            <img src="{{$comment->user->gravatar}}" alt="">
                            <p class="m-0 text-red"> {{$comment->user->name}} </p>
                        </div>

                        <div class="description-comments" >
                            <p class="text-blue"> {{$comment->comment}}  </p>
                        </div>

                    </div>



                    <div class="group-item ">

                        <div class="date ">
                            {{$comment->created_at_inhumas}}
                        </div>

                        <div class="likes">

                            <div class="dislike row text-center ">
                                <a href=" {{route('dislike.store' , ['likeable_type' => 'comment' , 'likeable_id'  => $comment])}} ">
                                    <i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i>
                                </a>
                                <span> {{$comment->dis_Like_Count}}  </span>
                            </div>



                            <div class="like row text-center ">
                                <a href=" {{route('like.store' , ['likeable_type' => 'comment' , 'likeable_id'  => $comment])}}  ">
                                    <i class="fa fa-thumbs-up fa-lg " aria-hidden="true"></i>
                                </a>
                                <span> {{$comment->like_Count}} </span>
                            </div>





                        </div>

                        <!--                    <div class="share">-->
                        <!--                        <a>-->
                        <!--                            <i class="fa fa-share fa-2x" aria-hidden="true"></i>-->
                        <!--                        </a>-->
                        <!--                    </div>-->

                    </div>

                </div>
            @endforeach

        </div>

    </div>

</div>



<script>
    $(document).ready(function () {
        $('.rate-star').click(function (e){
            e.preventDefault();

            let rating = $(this).data('rating');

            let isAuthenticated = $('meta[name="is-auth"]').attr('content');
            if (isAuthenticated === 'false') {
                window.location.href = '/login';
                return;
            }


            $.ajax({

                url: '{{route('rate.video' , $video->id)}}',
                method: 'POST',

                data: {
                    rating: rating,
                    _token: "{{ csrf_token() }}"
                },


                success: function (response) {
                    alert("امتیاز شما ثبت شد!");
                    $(".video-rating").text(response.new_rating);
                    let newRating = parseFloat(response.new_rating);
                    $('.rate-star').each(function () {
                        let starVal = parseInt($(this).data('rating'));
                        let starIcon = $(this).find('i');

                        if (newRating >= starVal) {
                            starIcon.attr('class', 'fa-solid fa-star');
                        } else if (newRating >= starVal - 0.5) {
                            starIcon.attr('class', 'fa-solid fa-star-half-stroke');
                        } else {
                            starIcon.attr('class', 'fa-regular fa-star');
                        }

                        starIcon.css('color', '#ffc107');
                    });
                },
                error: function (xhr) {
                    console.log(xhr.responseJSON);
                    alert("خطا در ارسال امتیاز!");
                }



            });


        })
    });
</script>








@endsection
