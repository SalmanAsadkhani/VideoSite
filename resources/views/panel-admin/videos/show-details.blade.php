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
                                            <td> {{ $video->id}}</td>
                                            <td> {{$video->name}} </td>

                                            <td>
                                                <div class="name-status orderDatatable-status d-inline-block" >
                                                    <span class="element-status {{ $video->status == 'allow' ? " order-bg-opacity-success  text-success "  : "order-bg-opacity-danger  text-danger" }}   rounded-pill"> {{ $video->status == 'allow' ? "تایید شده"  : "رد شده" }} </span>
                                                </div>
                                            </td>

                                            <td>

                                                <div class="form-check form-switch ">
                                                    <input class="form-check-input status" type="checkbox"
                                                        {{ $video->status == 'allow' ? "checked"  : "" }} data-id="{{$video->id}}" >
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
                                                        <a  class="remove" data-id = {{$video->id}}>
                                                            <i class="uil uil-trash-alt"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>


                            <script>
                                // فعال کردن و غیر فعال کردن وضعیت فیلم
                                $(document).ready(function () {
                                    $('.status').change(function () {

                                        // دریافت ایدی و  تغییر  باکس
                                        let videoId = $(this).data('id');
                                        let status = $(this).is(':checked') ? 'allow' : 'deny';

                                        // دریافت  االمنت  وضعیت و تغییر متن آن
                                        let statusElement = $(this).closest('tr').find('.element-status');
                                        let statusText = status === 'allow' ? "تایید شده" : "رد شده";

                                        $.ajax({
                                            url: "{{ route('panel.video.status', ':id') }}".replace(':id', videoId),
                                            type: "POST",
                                            data: {
                                                status: status,
                                                video_id: videoId,
                                                _token: "{{ csrf_token() }}"
                                            },
                                            success: function (response) {

                                                let newClass = response['status'] === 'allow' ? "order-bg-opacity-success text-success" : "order-bg-opacity-danger text-danger";

                                                statusElement.text(statusText)
                                                    .removeClass("order-bg-opacity-danger text-danger order-bg-opacity-success text-success") // حذف کلاس‌های قبلی
                                                    .addClass(newClass);
                                            },
                                            error: function (error) {
                                                console.log("Error:", error.responseText);
                                            }
                                        });
                                    });
                                });

                                // حذف کردن ویدیو
                                $(document).ready(function () {
                                    $('.remove').click(function () {
                                        let videoId = $(this).data('id');

                                        if (!confirm('ویدیو حذف گردد؟')) {
                                            return;
                                        }

                                        $.ajax({
                                            url: "{{ route('panel.video.destroy', ':id') }}".replace(':id', videoId),
                                            type: 'POST',
                                            data: {
                                                _method: "DELETE",
                                                video_id: videoId,
                                                _token: "{{ csrf_token() }}"
                                            },
                                            success: function (response) {
                                                alert(response['delete']);
                                                location.reload();
                                            },
                                            error: function (error) {
                                                alert(error['error'])
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
