@extends('/panel-admin/layout')
@section('content')




    <div class="contents">

        <div class="demo3 mb-25 t-thead-bg">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">داشبورد</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>داشبورد</a></li>

                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </div>

                        {{--topVideos--}}
                    <div class="col-xxl-4 mb-25">

                        <div class="card border-0 px-25 pb-15 h-100">
                            <div class="card-header px-0 border-0">
                                <h6>برترین ویدیوها</h6>
                            </div>

                            <div class="card-body p-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="t_selling-today222" role="tabpanel" aria-labelledby="t_selling-today222-tab">
                                        <div class="selling-table-wrap selling-table-wrap--source">
                                            <div class="table-responsive">
                                                <table class="table table--default table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>نام ویدیو</th>
                                                            <th> تعداد لایک ها </th>
                                                            <th> زمان  بارگزاری شده  </th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                    @foreach($topVideos as $video)
                                                        <tr>
                                                            <td>
                                                                <span class="p-2"> {{$video->name}} </span>
                                                            </td>
                                                            <td> {{$video->vote}} </td>
                                                            <td> {{ $video->created_at}} </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                                <div class="text-center w-50" dir="ltr">
                                                    <div class="small">
                                                        {{ $oldVideos->links() }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                        {{--oldvideos--}}
                    <div class="col-xxl-4 mb-25">
                        <div class="card border-0 pb-15 h-100">
                            <div class="card-header">
                                <h6> قدیمی ترین ویدیوها</h6>
                            </div>


                            <div class="card-body py-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="t_selling-today8" role="tabpanel" aria-labelledby="t_selling-today-tab">
                                        <div class="selling-table-wrap selling-table-wrap--source selling-table-wrap--transition ">
                                            <div class="table-responsive">
                                                <table class="table table--default table-borderless">

                                                    <thead>
                                                        <tr>
                                                            <th>نام ویدیو</th>
                                                            <th> روز / ماه / سال </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @foreach($oldVideos as $video)

                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <div>
                                                                            <h6> <span class="p-2">{{$video->name}} </span> </h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="color-success">
                                                                        <span> {{$video->created_at }} </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <div class="text-center w-50" dir="ltr">
                                                   <div class="small">
                                                       {{ $oldVideos->links() }}
                                                   </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                        {{--activeUsers--}}
                    <div class="col-12 mb-25">
                        <div class="card border-0 px-25 pb-10 h-100">

                            <div class="card-header px-0 border-0">
                                <h6>کاربران فعال</h6>

                            </div>


                            <div class="card-body p-0">
                                <div class="tab-content">

                                    <div class="tab-pane fade active show" id="t_selling-today222" role="tabpanel" aria-labelledby="t_selling-today222-tab">
                                        <div class="selling-table-wrap selling-table-wrap--source">
                                            <div class="table-responsive">
                                                <table class="table table--default table-borderless">
                                                    <thead>
                                                    <tr>
                                                        <th>نام کاربر</th>
                                                        <th>تعداد ویدیوها</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>

                                                    @foreach($users as $user )
                                                        <tr>
                                                            <td>
                                                                <span class="p-2"> {{$user->name}} </span>
                                                            </td>
                                                            <td>
                                                                <span class="text-danger"> {{  $user->videos()->count()  }} </span>
                                                                <span class="text-light">  ویدیو</span>
                                                            </td>
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

                </div>
                <!-- ends: .row -->
            </div>
        </div>

    </div>

@endsection
