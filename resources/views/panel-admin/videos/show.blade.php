
@extends('/panel-admin/layout')
@section('content')

<div class="contents">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-breadcrumb">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title"> جزییات ویدیو</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('panel.home')}}"><i class="uil uil-estate"></i>داشبورد</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">جزئیات ویدیو</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <x-validation-errors/>
    </div>

    <div class="products mb-30">
        <div class="container-fluid">
            <!-- Start: Card -->
            <div class="card product-details h-100 ">
                <div class="product-item d-flex p-sm-50 p-20">
                    <div class="row justify-content-center">
                        <div class="col-lg-offset-5 ">
                            <h1 class="card-title mb-4"> {{$video->name}}</h1>
                            <div class="video-code">
                                <video controls style="height: 100%; width: 100%;">
                                    <source src="{{ $video->video_url }}" type="video/mp4">
                                </video>
                            </div><!-- // video-code -->
                         </div>
                        <div class="col-lg-10 mt-4">

                            <div class=" b-normal-b mb-25 pb-sm-35 pb-15 mt-lg-0 mt-15">
                                <div class="product-item__body">

                                    <h1 class="card-title"> {{$video->name}}</h1>

                                    <div class="product-item__content text-capitalize">

                                        <div class="row d-flex gap-2  p-1 ">


                                        <span class="product-details-brandName">دسته بندی:
                                            <span> {{$video->category->name}} </span>
                                        </span>

                                            <ul class="d-flex gap-3">
                                                <li><a class="deslike text-body" href="{{route('dislike.store' , ['likeable_type' => 'video' , 'likeable_id'  => $video])}}">
                                                        {{$video->disLikeCount}} <i class="fa fa-thumbs-down "></i></a></li>

                                                <li><a class="like text-info " href="{{route('like.store' , ['likeable_type' => 'video' , 'likeable_id' => $video])}} ">
                                                        {{$video->likeCount}} <i class="fa fa-thumbs-up "></i></a></li>
                                            </ul>

                                        </div>


                                       <div class="mt-2">
                                           <h5> توضیحات :</h5>
                                           <div class="mt-1"> {{$video->description}}  </div>

                                       </div>

                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-10 b-normal-b mb-5   p-2 w-100">
                                <h6 class="text-danger mb-4 p-2 " style="color: #ff5e3a ; border-bottom: 2px solid #fab318" > <span class="text-light p-1"> {{$video->comments()->count()}} </span>  نظرات کاربران  : </h6>

                                <ul class="comments-list">
                                    @foreach($video->comments as  $comment)
                                        <li class="d-flex row gap-3  mt-4" style="border-bottom: 1px solid #ff5e3a">



                                            <div class="post_author d-flex ">

                                                <div class="img_in p-0">
                                                    <img  class="rounded-circle w-75 " src="{{$comment->user->gravatar}}" alt="">
                                                </div>

                                                <div class="d-flex row w-100 p-0">

                                                  <div class="d-flex justify-content-between  p-0  ">
                                                      <h6  class="author-name text-dark ">{{$comment->user->name}}</h6>
                                                      <a  href="#" class="text-danger">حذف کامنت</a>
                                                  </div>

                                                    <div class="d-flex gap-3 small">
                                                        <time datetime="2017-03-24T18:18">{{$comment->CreatedAtInHumas}}</time>

                                                        <a class="deslike mr-5 text-body"
                                                           href="{{route('dislike.store' , ['likeable_type' => 'comment' , 'likeable_id'  => $comment])}}">
                                                            {{$comment->disLikeCount}} <i class="fa fa-thumbs-down"></i></a>

                                                        <a class="like mr-5 text-info"
                                                           href="{{route('like.store' , ['likeable_type' => 'comment' , 'likeable_id'  => $comment])}} ">
                                                            {{$comment->likeCount}} <i class="fa fa-thumbs-up"></i></a>
                                                    </div>

                                                </div>

                                            </div>

                                            <p class="p-4">{{$comment->comment}}</p>

                                        </li>
                                    @endforeach

                                </ul>


                            </div>

                            @can('create' , [\App\Models\Comment::class , $video])
                            <h6 class="text-danger mb-4 p-2 " style="color: #ff5e3a ; border-bottom: 2px solid #fab318" >ارسال نظر </h6>
                            <form action="{{route("comments.store" ,$video)}}" method="post">
                                @csrf
                                <textarea class="form-control" name="comment" rows="8" id="Message" placeholder="پیام" required ></textarea>
                                <button id="contact_submit" type="submit"  class="btn btn-info btn-xs mt-3 small ">ارسال پیام</button>
                            </form>
                            @endcan

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
