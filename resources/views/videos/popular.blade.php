@extends('layout')
@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-start mb-3 mb-4">
        <div class="text-end">
            <h5 class="title-color">محبوب ترین ویدیو ها</h5>
        </div>
    </div>

    <div class="movies d-flex  flex-wrap justify-content-around align-items-center gap-3">
        @foreach($videos as $video)
            <x-video-box  :video="$video"/>
        @endforeach
    </div>

</div>
@endsection
