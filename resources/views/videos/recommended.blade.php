@extends('layout')
@section('content')

    <div class="container mt-5">
    <div class="d-flex justify-content-start mb-3 mb-4">
        <div class="text-end">
            <h5 class="title-color">ویدیوهای پیشنهادی</h5>
        </div>
    </div>

    <div class="movies d-flex  flex-wrap justify-content-around align-items-center gap-3">
        @foreach($videos as $video)
            <x-video-box  :video="$video"/>
        @endforeach

            <div class="text-center" dir="ltr">
                {{ $videos->links() }}
            </div>
    </div>

    <div class="text-center mt-4">

</div>
@endsection
