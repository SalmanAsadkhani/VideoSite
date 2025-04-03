@extends('layout')
@section('content')
    <div class="container p-0 mb-5">
        <div class="comments mt-5 ">

            <div class="d-flex justify-content-start mb-3 mb-4">
                <div class="d-flex align-items-center  gap-1  text-end ">
                    <i  style="color: #ff3366; font-size: 1.3rem" class="fa fa-comments"></i>
                    <h4 class="title-color"> نظرات من </h4>
                </div>
            </div>

            {{--sort--}}
            <div  class="d-flex justify-content-around align-items-center mt-5 w-75">

                <div>
                    <h5> مرتب سازی:</h5>
                </div>

                <a href="{{route('latest.comments')}}"  class="btn-sort btn-new  ">
                    <span> جدیدترین </span>
                </a>

                <a  href="{{route('oldest.comments')}}" class="btn-sort btn-old">
                    <span> قدیمی ترین </span>
                </a>

                <a   class="btn-sort btn-reaction" >
                    <span> بیشترین واکنش </span>
                </a>


            </div>



            <!--        comment-->
            <div class="comments">

                @foreach( $comments as $comment)
                    <div class="d-flex justify-content-between  align-items-center mt-5 item-comment">

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

                            <div class="date">
                                {{$comment->created_at_in_humas}}
                            </div>


                            <div class="likes">

                                <div class="dislike row text-center ">
                                    <a>
                                        <i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <span> {{$comment->disLikeCount}}  </span>
                                </div>

                                <div class="like row text-center ">
                                    <a>
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
            <div class="text-center mt-4 d-flex justify-content-center" dir="ltr">
                {{ $comments->links() }}
            </div>
    </div>

@endsection
