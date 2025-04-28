
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

        <a href="{{ route('videos.show', $video->slug) }}" class="d-flex justify-content-around text-light mt-2"  >
            <span class="small"> {{ $video->created_at }} </span>
            <span class="small"> <i class="fa fa-clock text-red"></i> {{$video->lengthInHuman}}   </span>
            <span class="video-rating"> {{ number_format($video->rating ) }} <i class="fa-solid fa-star" style="color: yellow"></i>   </span>
        </a>

    </div>


    <script>

        $(document).ready(function () {
            $(document).off('click', '.like-icon').on('click', '.like-icon', function () {

                let isAuthenticated = $('meta[name="is-auth"]').attr('content');
                if (isAuthenticated === 'false') {
                    window.location.href = '/login';
                    return;
                }



                let icon = $(this);
                let videoId = icon.data('id');

                $.ajax({
                    url: "{{ route('favorites.store') }}",
                    type: "POST",
                    data: {
                        video_id: videoId,
                        _token: "{{ csrf_token() }}"
                    },


                    error: function () {
                        alert("مشکلی پیش آمده است!");
                    }
                });
            });
        });

    </script>


    <div class="d-flex  justify-content-around text-center mt-3"  >
        <div class="text-success fw-bold" style="font-size: 15px ; font-family: Tahoma,sans-serif"><i class=" fa fa-user"></i> {{ $video->user->name }} </div>
        <div class="text-red" style="font-size: 13px">  <i class="fa fa-flag"></i> {{ $video->name }} </div>
    </div>


</div>





