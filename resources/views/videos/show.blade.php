@extends('layout')
@section('content')

{{--    <div class="row">--}}
{{--        <!-- Watch -->--}}
{{--        <div class="col-md-8">--}}
{{--            <x-validation-errors/>--}}

{{--            <div id="watch">--}}

{{--                <!-- Video Player -->--}}
{{--                <h1 class="video-title">{{ $video->name }}</h1>--}}
{{--                <div class="video-code">--}}
{{--                    <video controls style="height: 100%; width: 100%;">--}}
{{--                        <source src="{{ $video->video_url }}" type="video/mp4">--}}
{{--                    </video>--}}
{{--                </div><!-- // video-code -->--}}

{{--                <div>--}}
{{--                    <p>--}}
{{--                        {{ $video->description }}--}}
{{--                    </p>--}}
{{--                </div>--}}

{{--                <div class="video-share">--}}
{{--                    <ul class="like">--}}
{{--                        <li><a class="deslike" href="{{route('dislike.store' , ['likeable_type' => 'video' , 'likeable_id'  => $video])}}"> {{$video->disLikeCount}} <i class="fa fa-thumbs-down"></i></a></li>--}}

{{--                        <li><a class="like" href="{{route('like.store' , ['likeable_type' => 'video' , 'likeable_id' => $video])}} ">--}}
{{--                                {{$video->likeCount}} <i class="fa fa-thumbs-up"></i></a></li>--}}
{{--                    </ul>--}}
{{--                    <ul class="social_link">--}}
{{--                        <li><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--                        </li>--}}
{{--                        <li><a class="youtube" href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>--}}
{{--                        </li>--}}
{{--                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>--}}
{{--                        </li>--}}
{{--                        <li><a class="google" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>--}}
{{--                        </li>--}}
{{--                        <li><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
{{--                        </li>--}}
{{--                        <li><a class="rss" href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>--}}
{{--                    </ul><!-- // Social -->--}}
{{--                </div><!-- // video-share -->--}}
{{--                <!-- // Video Player -->--}}


{{--                <!-- Chanels Item -->--}}
{{--                <div class="chanel-item">--}}
{{--                    <div class="chanel-thumb">--}}
{{--                        <a href="#"><img src="{{$video->owner_avatar}}" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <div class="chanel-info">--}}
{{--                        <a class="title" href="#">{{$video->owner_name}} </a>--}}
{{--                        <span class="subscribers">#</span>--}}
{{--                    </div>--}}
{{--                    <a href="#" class="subscribe">مشاهده همه ویدیوهای داوود طاهری</a>--}}
{{--                </div>--}}
{{--                <!-- // Chanels Item -->--}}



{{--                <!-- Comments -->--}}

{{--                <div id="comments" class="post-comments">--}}
{{--                    <h3 class="post-box-title"><span>{{$video->comments->count() }}</span> نظرات</h3>--}}
{{--                    <ul class="comments-list">--}}
{{--                        @foreach($video->comments as  $comment)--}}
{{--                        <li>--}}
{{--                            <div class="post_author">--}}
{{--                                <div class="img_in">--}}
{{--                                    <a href="#"><img src="{{$comment->user->gravatar}}" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="author-name">{{$comment->user->name}}</a>--}}
{{--                                <time datetime="2017-03-24T18:18">{{$comment->CreatedAtInHumas}}</time>--}}


{{--                                    <a class="deslike mr-5" style="color: #aaaaaa"--}}
{{--                                           href="{{route('dislike.store' , ['likeable_type' => 'comment' , 'likeable_id'  => $comment])}}">--}}
{{--                                        {{$comment->disLikeCount}} <i class="fa fa-thumbs-down"></i></a>--}}


{{--                                    <a class="like mr-5"  style="color: #66c0c2"--}}
{{--                                       href="{{route('like.store' , ['likeable_type' => 'comment' , 'likeable_id'  => $comment])}} ">--}}
{{--                                        {{$comment->likeCount}} <i class="fa fa-thumbs-up"></i></a>--}}





{{--                            </div>--}}
{{--                          <p>{{$comment->comment}}</p>--}}


{{--                        </li>--}}
{{--                        @endforeach--}}

{{--                    </ul>--}}



{{--                    @auth()--}}
{{--                        @can('create' , [\App\Models\Comment::class , $video])--}}
{{--                    <h3 class="post-box-title">ارسال نظرات</h3>--}}

{{--                    <form action="{{route("comments.store" ,$video)}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <textarea  class="form-control" name="comment" rows="8" id="Message" placeholder="پیام" required></textarea>--}}
{{--                        <button id="contact_submit"  class="btn btn-dm">ارسال پیام</button>--}}
{{--                    </form>--}}
{{--                        @endcan--}}
{{--                    @endauth--}}

{{--                    @guest()--}}

{{--                        <h3 class="post-box-title">ارسال نظرات</h3>--}}
{{--                        <textarea class="form-control" disabled placeholder="برای درج نظر در سایت ثبت نام کنید"></textarea>--}}
{{--                         <a href="{{route('register.create')}}" class="btn btn-dm" >ثبت نام</a>--}}

{{--                    @endguest--}}

{{--                </div>--}}
{{--                <!-- // Comments -->--}}


{{--            </div>--}}
{{--        </div>--}}



{{--        <!-- Related Posts-->--}}
{{--        <div class="col-md-4">--}}
{{--            <x-related-videos :video="$video" />--}}
{{--        </div><!-- // col-md-4 -->--}}
{{--        <!-- // Related Posts -->--}}
{{--    </div>--}}



<div class="container p-0 mb-5" style="max-width: 60rem" dir="rtl">

    <div class="watch" id="watch" dir="rtl" >
        <div class="video-code  mt-5">
            <video controls preload="auto" width="100%" height="100%">
                <source src="{{ $video->video_url }}" type="video/mp4">
            </video>

            <div class="d-flex justify-content-between align-items-center">
                <div class="row gap-2" style=" max-width: 46.1rem; line-height: 1.5rem;">
                    <h6 class="text-blue me-2 mt-3"> {{$video->name}} </h6>
                    <div class="owner d-flex align-items-center gap-1 align-self-center">
                        <img src="https://www.gravatar.com/avatar/94e459431e3d23f72ae2a0c541863530" alt="">
                        <p class="m-0 text-red"> {{$video->user->name}} </p>
                    </div>
                </div>

                <div class="group-item text-center">

                    <div class="btn btn-download">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        <span>دانلود</span>
                    </div>

                </div>
            </div>


            <div class="d-flex justify-content-between align-items-center">

                <div class="user-point ">

                    <div class="point">
                        <span class="text-light small">5/</span>
                        <span class="point active">4.6</span>
                    </div>
                    <div>
                        <span>امتیاز </span> <span class="text-red">کاربران</span>
                    </div>
                </div>

                <div class="group-item text-center">

                    <div class="likes">

                        <div class="dislike row text-center ">
                            <a href="#">
                                <i class="fa fa-thumbs-down fa-lg " aria-hidden="true"></i>
                            </a>
                            <span> 0 </span>
                        </div>

                        <div class="like row text-center ">
                            <a href="#">
                                <i class="fa fa-thumbs-up fa-lg " aria-hidden="true"></i>
                            </a>
                            <span> 1 </span>
                        </div>

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
            <form  class="d-flex mt-4  " style="height: 2.8rem;" method="post" action="{{route("comments.store" ,$video)}}">
                @csrf
                <label for="comment"></label><textarea class="send-comment" name="comment"   id="comment" placeholder="دیدگاهتان را بنویسید ..." required></textarea>
                <button  class="btn-submit">انتشار</button>
            </form>
        @endauth



        <div  class="d-flex justify-content-around align-items-center mt-5">

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
                            {{$comment->user->name}}
                        </div>

                        <div class="likes">

                            <div class="dislike row text-center ">
                                <a href=" {{route('dislike.store' , ['likeable_type' => 'comment' , 'likeable_id'  => $comment])}} ">
                                    <i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i>
                                </a>
                                <span> {{$comment->disLikeCount}}  </span>
                            </div>

                            <div class="like row text-center ">
                                <a href=" {{route('like.store' , ['likeable_type' => 'comment' , 'likeable_id'  => $comment])}}  ">
                                    <i class="fa fa-thumbs-up fa-lg " aria-hidden="true"></i>
                                </a>
                                <span> {{$comment->likeCount}} </span>
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
















@endsection
