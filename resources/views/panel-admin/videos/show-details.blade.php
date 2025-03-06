@extends('/panel-admin/layout')
@section('content')

    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">جزییات ویدیو ها</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route("panel.show.all")}}"><i class="uil uil-estate"></i>ویدیوها</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> جزییات ویدیو </li>
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
                                    <th>تغییر وضعیت</th>
                                    <th>عملیات </th>
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
                                                    <div class="d-flex  gap-2">
                                                        <button type="submit" class="btn btn-success btn-sm change-status" data-id="{{ $video->id }}" data-status="1">تایید</button>
                                                        <button type="submit" class="btn btn-warning btn-sm change-status" data-id="{{ $video->id }}" data-status="2">رد</button>
                                                        <button type="submit"  class="btn btn-danger btn-sm change-status" data-id="{{ $video->id }}" data-status="3">مسدود</button>
                                                    </div>

                                                </td>

                                                <td>
                                                    <ul class="orderDatatable_actions mb-0 d-flex flex-wrap float-start gap-2">
                                                        <li>
                                                            <a href=" {{ route('panel.show' , $video->slug)}} " class="view">
                                                                <i class="uil uil-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('panel.video.edit' , $video->slug)}} " class="edit">
                                                                <i class="uil uil-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href=" {{ route('panel.video.destroy' , $video->slug) }}" class="remove" data-id=" {{$video->id}} ">
                                                                <i class="uil uil-trash-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
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
                                                    <div class="d-flex gap-2">
                                                        <button type="submit" class="btn btn-success btn-sm change-status" data-id="{{ $video->id }}" data-status="1">تایید</button>
                                                        <button type="submit" class="btn btn-warning btn-sm change-status" data-id="{{ $video->id }}" data-status="2">رد</button>
                                                        <button type="submit"  class="btn btn-danger btn-sm change-status" data-id="{{ $video->id }}" data-status="3">مسدود</button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <ul class="orderDatatable_actions mb-0 d-flex flex-wrap float-start gap-2">
                                                        <li>
                                                            <a href=" {{ route('panel.show' , $video->slug)}} " class="view">
                                                                <i class="uil uil-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href=" {{ route('panel.video.edit' , $video->slug)}} " class="edit">
                                                                <i class="uil uil-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href=" {{ route('panel.video.destroy' , $video->slug) }}" class="remove"  data-id = {{$video->id}}>
                                                                <i class="uil uil-trash-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
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
                                                    <div class="d-flex gap-2 ">
                                                        <button type="submit" class="btn btn-success btn-sm change-status" data-id="{{ $video->id }}" data-status="1">تایید</button>
                                                        <button type="submit" class="btn btn-warning btn-sm change-status" data-id="{{ $video->id }}" data-status="2">رد</button>
                                                        <button type="submit"  class="btn btn-danger btn-sm change-status" data-id="{{ $video->id }}" data-status="3">مسدود</button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <ul class="orderDatatable_actions mb-0 d-flex float-start  gap-2">
                                                        <li>
                                                            <a href=" {{ route('panel.show' , $video->slug)}} " class="view">
                                                                <i class="uil uil-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href=" {{ route('panel.video.edit' , $video->slug)}} " class="edit">
                                                                <i class="uil uil-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href=" {{ route('panel.video.destroy' , $video->slug) }}" class="remove" data-id = {{$video->id}}>
                                                                <i class="uil uil-trash-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
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
                                                    <div class="d-flex gap-2">
                                                        <button type="submit" class="btn btn-success btn-sm change-status" data-id="{{ $video->id }}" data-status="1">تایید</button>
                                                        <button type="submit" class="btn btn-warning btn-sm change-status" data-id="{{ $video->id }}" data-status="2">رد</button>
                                                        <button type="submit"  class="btn btn-danger btn-sm change-status" data-id="{{ $video->id }}" data-status="3">مسدود</button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <ul class="orderDatatable_actions mb-0 d-flex flex-wrap float-start gap-2">
                                                        <li>
                                                            <a href=" {{ route('panel.show' , $video->slug)}} " class="view">
                                                                <i class="uil uil-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href=" {{ route('panel.video.edit' , $video->slug)}} " class="edit">
                                                                <i class="uil uil-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href=" {{ route('panel.video.destroy' , $video->slug) }}" class="remove"  data-id = {{$video->id}} >
                                                                <i class="uil uil-trash-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>

                                            @endif
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>


                            <script>

                                $(document).ready(function() {
                                    $(".remove").click(function(e) {
                                        e.preventDefault(); // جلوگیری از لود شدن صفحه

                                        var videoId = $(this).data("id"); // دریافت ID ویدیو
                                        var url = $(this).attr("href"); // دریافت لینک حذف از `href`
                                        var row = $(this).closest("tr"); // گرفتن ردیف مربوطه

                                        if (confirm("آیا مطمئن هستید که می‌خواهید این ویدیو را حذف کنید؟")) {
                                            $.ajax({
                                                url: url,
                                                type: "POST", // متد `POST` برای حذف
                                                data: {
                                                    _method: "DELETE", // شبیه‌سازی متد `DELETE`
                                                    _token: "{{ csrf_token() }}", // ارسال CSRF برای امنیت
                                                    id: videoId
                                                },
                                                success: function(response) {
                                                    if (response.success) {
                                                        row.fadeOut(); // حذف ردیف از جدول
                                                        alert(response.message);
                                                    } else {
                                                        alert("خطا در حذف ویدیو!");
                                                    }
                                                },
                                                error: function() {
                                                    alert("ارتباط با سرور برقرار نشد!");
                                                }
                                            });
                                        }
                                    });
                                });

                                $(document).ready(function () {

                                    $(document).on('click', '.change-status', function () {

                                        let videoId = $(this).data('id');
                                        let newStatus = $(this).data('status');
                                        let token = $('meta[name="csrf-token"]').attr('content');

                                        $.ajax({
                                            url: '{{ route("videos.changeStatus") }}',
                                            type: 'POST',
                                            data: {
                                                _token: token,
                                                video_id: videoId,
                                                status: newStatus
                                            },
                                            success: function (response) {
                                                alert(response.message);
                                                location.reload();
                                            },
                                            error: function (xhr) {
                                                alert('خطایی رخ داده است: ' + xhr.responseText);
                                            }
                                        });
                                    });
                                });
                            </script>


                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- End: Product page -->
                </div>
                <!-- ends: col-lg-12 -->
            </div>

            <div class="text-center w-50 mb-4" dir="ltr">
                <div class="small">
                    {{ $videos->links() }}
                </div>
            </div>
        </div>

    </div>

@endsection
