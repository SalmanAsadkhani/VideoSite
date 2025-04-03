
@extends('layout')
@section('content')

<div class="container justify-content-center mt-5">

    <div class="d-flex justify-content-start mb-3 mb-4">
        <div class="text-end">
            <h5 class="title-color">جدیدترین ویدیوها</h5>
        </div>
    </div>

    <div class="movies d-flex  flex-wrap justify-content-around align-items-center gap-3">
        @foreach($newVideos as $video)
            <x-video-box  :video="$video"/>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-5" dir="ltr">
        <div class="small">
            {{ $newVideos->links()}}
        </div>
    </div>

</div>

@endsection
