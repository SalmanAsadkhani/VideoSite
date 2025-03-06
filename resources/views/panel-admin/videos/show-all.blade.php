@extends('/panel-admin/layout')
@section('content')

    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">ویدیوها</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('panel.home')}}"><i class="uil uil-estate"></i>داشبورد</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">مشاهده ویدیوها</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <x-validation-errors/>
        <div class="container-fluid">
            <div class="border-1 px-25 pb-15 h-100" style="background-color: #f6f0d1" >

                <div class="card-header px-5  text-start border-0 pt-3 mb-4">
                    <h6>مشاهده ویدیو ها </h6>
                </div>

                <div class="row ">
                    @foreach($videos as $video)
                        <div class="mt-5 col-lg-4 col-md-3 col-sm-4 d-flex flex-wrap justify-content-center ">
                            <div class="card product product--grid col-10  "  >
                                    <div class="product-item">

                                        <div class="product-item__image">
                                            <span class="like-icon">
                                                <button type="button" class="content-center">
                                                    <i class="lar la-heart icon"></i>
                                                </button>
                                            </span>

                                            <a href="{{route('panel.show' , $video->slug)}}"><img class="card-img-top img-fluid" src=" {{$video->video_thumbnail}} " alt="videos"></a>
                                        </div>

                                        <div class="card px-20 pb-25 pt-25">
                                            <div class="product-item__body text-capitalize">
                                                <a href="">
                                                    <h6 class="card-title"> {{ $video->name }} </h6>
                                                </a>

                                                <div class="stars-rating d-flex align-items-center flex-wrap mb-10">
                                                    <span class="star-icon las la-star active"></span>
                                                    <span class="star-icon las la-star active"></span>
                                                    <span class="star-icon las la-star active"></span>
                                                    <span class="star-icon las la-star active"></span>
                                                    <span class="star-icon las la-star-half-alt active"></span>
                                                    <span class="stars-rating__point">4.9</span>
                                                    <span class="stars-rating__review">
                                                          <span> {{$video->comments()->count()}} </span> کامنت</span>
                                                </div>

                                            </div>

                                            <div class="flex-sm-column">
                                                    <div class="text-light">  <i class="fa fa-check-circle small p-0"></i> {{$video->owner_name}} </div>
                                                    <small class="text-warning small">  <i class="fa fa-calendar-check small p-1" aria-hidden="true"></i> {{$video->created_at}} </small>
                                                    <div class="text-success text-start product-discount"> <i class="fa fa-tag p-1" ></i> {{$video->category_name}} </div>
                                            </div>

                                            <div class="mt-3 d-flex flex-wrap justify-content-center">
                                                <a href="{{ route('panel.show' , $video->slug)  }}" class="text btn-sm btn-primary">
                                                    <span> مشاهده ویدیو </span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </div>
                    @endforeach

                        <div class="mt-5  text-center w-50 m-5" dir="ltr">
                            <div class="small">
                                {{ $videos->links() }}
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>
@endsection
