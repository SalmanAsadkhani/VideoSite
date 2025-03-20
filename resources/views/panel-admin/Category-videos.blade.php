
@extends('/panel-admin/layout')
@section('content')



<div class="contents">

    <div class="demo7 mb-25 t-thead-bg">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title"> داشبورد</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>داشبورد</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> دسته بندی ویدیو</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>

                    {{--registeredUsers--}}
                <div class="col-xxl-12 mb-25">
                    <div class="card border-0 px-25">

                        <div class="card-header px-0 border-0 mb-2">
                            <h6> کاربرهای ثبت نام شده اخیر </h6>
                        </div>

                        <div class="card-body p-0 mt-n10">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="t_selling-today222" role="tabpanel" aria-labelledby="t_selling-today222-tab">
                                    <div class="selling-table-wrap selling-table-wrap--source">
                                        <div class="table-responsive">
                                            <table class="table table--default table-borderless">
                                                <thead>
                                                        <tr>
                                                            <th> ایدی  </th>

                                                            <th> <span class="p-5" > نام</span> </th>

                                                            <th>  <span class="p-2" > ایمیل </span>  </th>

                                                            <th>جنسیت</th>

                                                            <th>روز / ماه / سال</th>
                                                        </tr>

                                                </thead>

                                                <tbody>

                                                @foreach($registeredUsers as $user)
                                                    <tr>
                                                        <td>
                                                                <span class="p-2"> {{$user->id}} </span>
                                                        </td>

                                                        <td> <span class="p-4" >  {{$user->name}} </span> </td>
                                                        <td>  {{$user->email}} </td>
                                                        <td> @lang($user->sex) </td>

                                                        <td>  {{$user->created_at}} </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>



                {{--newVideos--}}
                <div class="col-xxl-4 mb-25">
                    <div class="card border-0 px-25">
                        <div class="card-header px-0 border-0">
                            <h6>فیلم های جدید</h6>
                        </div>

                        <div class="card-body p-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="t_selling-today" role="tabpanel" aria-labelledby="t_selling-today-tab">
                                    <div class="selling-table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table--default table-borderless ">
                                                <thead>
                                                <tr>
                                                    <th>نام مالک</th>
                                                    <th>نام فیلم</th>
                                                </tr>
                                                </thead>

                                                <tbody>

                                                @foreach($newVideos as $video )
                                                    <tr>

                                                        <td>{{$video->user->name}}</td>

                                                        <td> {{$video->name}} </td>

                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                            <div class="text-center w-50 mb-4" dir="ltr">
                                                <div class="small">
                                                    {{ $newVideos->links() }}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>











                <!--
                <div class="col-xxl-8 mb-25">
                    <div class="card border-0 px-25">
                        <div class="card-header px-0 border-0">
                            <h6>پرفروش ترین</h6>
                            <div class="card-extra">
                                <ul class="card-tab-links nav-tabs nav" role="tablist">
                                    <li>
                                        <a class="active" href="#t_selling-today222" data-bs-toggle="tab" id="t_selling-today222-tab" role="tab" aria-selected="true">امروز</a>
                                    </li>
                                    <li>
                                        <a href="#t_selling-week222" data-bs-toggle="tab" id="t_selling-week222-tab" role="tab" aria-selected="true">هفته</a>
                                    </li>
                                    <li>
                                        <a href="#t_selling-month333" data-bs-toggle="tab" id="t_selling-month333-tab" role="tab" aria-selected="true">ماه</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="t_selling-today222" role="tabpanel" aria-labelledby="t_selling-today222-tab">
                                    <div class="selling-table-wrap selling-table-wrap--source">
                                        <div class="table-responsive">
                                            <table class="table table--default table-borderless">
                                                <thead>
                                                <tr>
                                                    <th>نام فروشنده</th>
                                                    <th>شرکت</th>
                                                    <th>محصول</th>
                                                    <th>درآمد</th>
                                                    <th>وضعیت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-1.png" alt="img">
                                                            </div>
                                                            <span>اشکان نوری</span>
                                                        </div>
                                                    </td>
                                                    <td>سامسونگ</td>
                                                    <td>Smart Phone</td>
                                                    <td>
                                                        $38,536
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-2.png" alt="img">
                                                            </div>
                                                            <span> مایکل جانسون </span>
                                                        </div>
                                                    </td>
                                                    <td>ایسوس</td>
                                                    <td>Laptop</td>
                                                    <td>
                                                        $20,573
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-secondary align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-3.png" alt="img">
                                                            </div>
                                                            <span>دانیل وایت</span>
                                                        </div>
                                                    </td>
                                                    <td>گوگل</td>
                                                    <td>Watch</td>
                                                    <td>
                                                        $17,457
                                                    </td>
                                                    <td>در انتظار</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-success align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-4.png" alt="img">
                                                            </div>
                                                            <span> کریس بارین </span>
                                                        </div>
                                                    </td>
                                                    <td>اپل</td>
                                                    <td>Computer</td>
                                                    <td>
                                                        $15,354
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-info align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-5.png" alt="img">
                                                            </div>
                                                            <span>دانیل پینک</span>
                                                        </div>
                                                    </td>
                                                    <td>پاناسونیک</td>
                                                    <td>Sunglass</td>
                                                    <td>
                                                        $12,354
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="t_selling-week222" role="tabpanel" aria-labelledby="t_selling-week222-tab">
                                    <div class="selling-table-wrap selling-table-wrap--source">
                                        <div class="table-responsive">
                                            <table class="table table--default table-borderless">
                                                <thead>
                                                <tr>
                                                    <th>نام فروشنده</th>
                                                    <th>شرکت</th>
                                                    <th>محصول</th>
                                                    <th>درآمد</th>
                                                    <th>وضعیت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-1.png" alt="img">
                                                            </div>
                                                            <span>اشکان نوری</span>
                                                        </div>
                                                    </td>
                                                    <td>سامسونگ</td>
                                                    <td>Smart Phone</td>
                                                    <td>
                                                        $38,536
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-2.png" alt="img">
                                                            </div>
                                                            <span> مایکل جانسون </span>
                                                        </div>
                                                    </td>
                                                    <td>ایسوس</td>
                                                    <td>Laptop</td>
                                                    <td>
                                                        $20,573
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-secondary align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-3.png" alt="img">
                                                            </div>
                                                            <span>دانیل وایت</span>
                                                        </div>
                                                    </td>
                                                    <td>گوگل</td>
                                                    <td>Watch</td>
                                                    <td>
                                                        $17,457
                                                    </td>
                                                    <td>در انتظار</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-success align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-4.png" alt="img">
                                                            </div>
                                                            <span> کریس بارین </span>
                                                        </div>
                                                    </td>
                                                    <td>اپل</td>
                                                    <td>Computer</td>
                                                    <td>
                                                        $15,354
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-info align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-5.png" alt="img">
                                                            </div>
                                                            <span>دانیل پینک</span>
                                                        </div>
                                                    </td>
                                                    <td>پاناسونیک</td>
                                                    <td>Sunglass</td>
                                                    <td>
                                                        $12,354
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="t_selling-month333" role="tabpanel" aria-labelledby="t_selling-month333-tab">
                                    <div class="selling-table-wrap selling-table-wrap--source">
                                        <div class="table-responsive">
                                            <table class="table table--default table-borderless">
                                                <thead>
                                                <tr>
                                                    <th>نام فروشنده</th>
                                                    <th>شرکت</th>
                                                    <th>محصول</th>
                                                    <th>درآمد</th>
                                                    <th>وضعیت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-1.png" alt="img">
                                                            </div>
                                                            <span>اشکان نوری</span>
                                                        </div>
                                                    </td>
                                                    <td>سامسونگ</td>
                                                    <td>Smart Phone</td>
                                                    <td>
                                                        $38,536
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-2.png" alt="img">
                                                            </div>
                                                            <span> مایکل جانسون </span>
                                                        </div>
                                                    </td>
                                                    <td>ایسوس</td>
                                                    <td>Laptop</td>
                                                    <td>
                                                        $20,573
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-secondary align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-3.png" alt="img">
                                                            </div>
                                                            <span>دانیل وایت</span>
                                                        </div>
                                                    </td>
                                                    <td>گوگل</td>
                                                    <td>Watch</td>
                                                    <td>
                                                        $17,457
                                                    </td>
                                                    <td>در انتظار</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-success align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-4.png" alt="img">
                                                            </div>
                                                            <span> کریس بارین </span>
                                                        </div>
                                                    </td>
                                                    <td>اپل</td>
                                                    <td>Computer</td>
                                                    <td>
                                                        $15,354
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="selling-product-img d-flex align-items-center">
                                                            <div class="selling-product-img-wrapper order-bg-opacity-info align-items-end">
                                                                <img class=" img-fluid" src="img/author/robert-5.png" alt="img">
                                                            </div>
                                                            <span>دانیل پینک</span>
                                                        </div>
                                                    </td>
                                                    <td>پاناسونیک</td>
                                                    <td>Sunglass</td>
                                                    <td>
                                                        $12,354
                                                    </td>
                                                    <td>انجام شد</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                -->
            </div>

            <!-- ends: .row -->
        </div>
    </div>

</div>

@endsection
