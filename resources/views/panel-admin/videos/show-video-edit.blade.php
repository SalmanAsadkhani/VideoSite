@extends('/panel-admin/layout')
@section('content')

    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">نمایش ویدیو برای ویرایش</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route("panel.show.all")}}"><i class="uil uil-estate"></i>ویدیوها</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">  نمایش ویدیوها</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Start: product page -->
                    <div class="product-add global-shadow px-sm-30 py-sm-50 px-0 py-20 bg-white radius-xl w-100 mb-40">
                        <div class="row justify-content-center">

                            <table class="table m-0 col-xxl-7 col-lg-10">
                                <thead>
                                <tr>
                                    <th>ایدی ویدیو</th>
                                    <th>ویدیو</th>
                                    <th>وضعیت</th>
                                    <th> دسته بندی</th>
                                    <th>ویرایش </th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($videos as $video)
                                    <tr>
                                        @if( $video->status === 0 )
                                            <td>{{ $video->id}}</td>
                                            <td> {{$video->name}} </td>
                                            <td>
                                                <div class="orderDatatable-status d-inline-block" >
                                                    <span class="order-bg-opacity-warning  text-warning rounded-pill"> در انتظار تایید </span>
                                                </div>
                                            </td>

                                            <td>
                                                <span class="badge badge-light"> {{$video->category->name}} </span>
                                            </td>

                                            <td>
                                                <a href="{{ route('panel.video.edit', $video->slug)}}" class="text-warning">
                                                    <span class="material-symbols-outlined">movie_edit</span>
                                                </a>
                                            </td>

                                        @elseif($video->status === 1)
                                            <td>{{ $video->id}}</td>
                                            <td> {{$video->name}} </td>

                                            <td>
                                                <div class="orderDatatable-status d-inline-block" >
                                                    <span class="order-bg-opacity-success  text-success rounded-pill"> تایید شده </span>
                                                </div>
                                            </td>

                                            <td>
                                                <span class="badge badge-light "> {{$video->category->name}} </span>
                                            </td>


                                            <td>
                                                <a href="{{ route('panel.video.edit', $video->slug)}}" class="text-warning">
                                                    <span class="material-symbols-outlined">movie_edit</span>
                                                </a>
                                            </td>


                                        @elseif($video->status === 2)
                                            <td> {{ $video->id}}</td>
                                            <td> {{$video->name}} </td>

                                            <td>
                                                <div class="orderDatatable-status d-inline-block" >
                                                    <span class="order-bg-opacity-danger  text-danger rounded-pill"> رد شده</span>
                                                </div>
                                            </td>


                                            <td>
                                                <span class="badge badge-light"> {{$video->category->name}} </span>
                                            </td>


                                            <td>
                                                <a href="{{ route('panel.video.edit', $video->slug)}}" class="text-warning">
                                                    <span class="material-symbols-outlined">movie_edit</span>
                                                </a>
                                            </td>

                                        @elseif($video->status === 3)
                                            <td> {{ $video->id}}</td>
                                            <td> {{$video->name}} </td>

                                            <td>
                                                <div class="orderDatatable-status d-inline-block" >
                                                    <span class="order-bg-opacity-danger  text-light rounded-pill"> مسدود شده </span>
                                                </div>
                                            </td>


                                            <td>
                                                <span class="badge badge-light"> {{$video->category->name}} </span>
                                            </td>



                                            <td>
                                                <a href="{{ route('panel.video.edit', $video->slug)}}" class="text-warning">
                                                    <span class="material-symbols-outlined">movie_edit</span>
                                                </a>
                                            </td>


                                        @endif
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>


                        </div>

                    </div>

                </div>

            </div>

            <div class="text-center w-50 mb-4" dir="ltr">
                <div class="small">
                    {{ $videos->links() }}
                </div>
            </div>
        </div>

    </div>

@endsection
