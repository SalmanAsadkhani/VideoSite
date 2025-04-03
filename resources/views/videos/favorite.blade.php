@extends('layout')
@section('content')

    @if($favoriteVideos->isEmpty())
        <div class="container mt-5">
            <div class="d-flex justify-content-start mb-3 mb-4">
                <div class="d-flex align-items-center  gap-1  text-end ">
                    <i  style="color: #ff3366; font-size: 1.3rem" class="fa fa-heart"></i>
                    <h5 class="title-color">  ویدیوهای مورد علاقه </h5>
                </div>
            </div>

            <div class="movies d-flex  flex-wrap justify-content-around align-items-center gap-3">
                <div class="text-red fw-semibold"> ویدیو مورد علاقه وجود ندارد</div>
                <span class="fw-semibold"><a href="{{route('index')}}">بازگشت</a> </span>
            </div>
        </div>
    @else
        <div class="container mt-5">
            <div class="d-flex justify-content-start mb-3 mb-4">
                <div class="d-flex align-items-center  gap-1  text-end ">
                    <i  style="color: #ff3366; font-size: 1.3rem" class="fa fa-heart"></i>
                    <h5 class="title-color">  ویدیوهای مورد علاقه </h5>
                </div>
            </div>

            <div class="movies d-flex  flex-wrap justify-content-around align-items-center gap-3">
                @foreach($favoriteVideos as $video)


                    <div class="movie-item" style="max-width: 15rem ; margin: auto 0"  data-id="{{ $video->id }}">
                        <div class="movie-card pb-2 mb-1">

                            @php
                                $userId = auth()->id();
                                $favorites = \App\Models\Favorite::where('user_id', $userId)->pluck('video_id')->toArray();
                            @endphp

                            <div class="like-icon border {{ in_array($video->id, $favorites) ? 'liked' : '' }}"
                                 data-id="{{ $video->id }}">
                                <i class="{{ in_array($video->id, $favorites) ? 'fa-solid fa-heart' : 'fa-regular fa-heart' }}"></i>
                            </div>


                            <a href="{{ route('videos.show', $video->slug) }}"><img src="{{ $video->video_thumbnail}}" alt=""></a>

                            <div class="d-flex justify-content-around text-light mt-2"  >
                                <span class="small"> {{ $video->created_at }} </span>
                                <span class="small"> <i class="fa fa-clock text-red"></i> {{$video->lengthInHuman}}   </span>
                                <span>⭐ 7.5</span>
                            </div>

                        </div>


                        <script>

                            $(document).off('click', '.like-icon').on('click', '.like-icon', function () {
                                let videoCard = $(this).closest('.movie-item');
                                let videoId = $(this).data('id');

                                $.ajax({
                                    url: '/favorites',
                                    type: 'POST',
                                    data: {
                                        video_id: videoId,
                                        _token: $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function (response) {
                                        if (response.status === 'removed') {
                                            videoCard.fadeOut(300, function () { $(this).remove(); });
                                        }
                                    },
                                    error: function () {
                                        alert('مشکلی پیش آمده، دوباره تلاش کنید!');
                                    }
                                });
                            });

                        </script>


                        <div class="d-flex  justify-content-around text-center mt-3"  >
                            <div class="text-success fw-bold" style="font-size: 15px ; font-family: Tahoma,sans-serif"><i class=" fa fa-user"></i> {{ $video->user->name }} </div>
                            <div class="text-red" style="font-size: 13px">  <i class="fa fa-flag"></i> {{ $video->name }} </div>
                        </div>


                    </div>


                @endforeach

                <div class="text-center" dir="ltr">
                    {{ $favoriteVideos->links() }}
                </div>
            </div>



    @endif

@endsection
