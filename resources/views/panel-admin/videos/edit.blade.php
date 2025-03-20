@extends('/panel-admin/layout')
@section('content')


    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">ویرایش ویدیو</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route("panel.show.all")}}"><i class="uil uil-estate"></i>ویدیوها</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">ویرایش ویدیو</li>
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
                            <div class="col-xxl-7 col-lg-10">

                                <x-validation-errors></x-validation-errors>

                                <form method="post" action="{{ route('panel.video.update' , $video->slug)}}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="mx-sm-30 mx-20 ">
                                        <div class="card add-product p-sm-30 p-20 mb-30">
                                            <div class="card-body p-0">
                                                <div class="card-header">
                                                    <h6 class="fw-500">درباره ویدیو</h6>
                                                </div>

                                                <div class="add-product__body px-sm-40 px-20">
                                                    {{--StartName--}}
                                                    <div class="form-group">
                                                        <label for="name">نام </label>
                                                        <input type="text" name="name"  class="form-control" id="name" value="{{$video->name}}" placeholder=" نام ویدیو ">
                                                        @error('name') <small class="text-danger"> {{$message}} </small> @enderror
                                                    </div>

                                                    {{--StartCategory--}}
                                                    <div class="form-group">
                                                        <div class="countryOption">
                                                            <label for="countryOption">دسته بندی</label>
                                                            <select class="js-example-basic-single js-states form-control" name="category_id">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        {{ $category->id == $video->category_id ? 'selected' : '' }}>
                                                                        {{ $category->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    {{--StartSlug--}}
                                                    <div class="form-group">
                                                        <label for="slug"> عنوان متا</label>
                                                        <input type="text" class="form-control" name="slug" id="slug" placeholder="عنوان متا" value="{{$video->slug}}" >
                                                        @error('slug') <small class="text-danger"> {{$message}} </small> @enderror
                                                    </div>

                                                    {{--StartDescription--}}
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">توضیحات ویدیو</label>
                                                        <textarea class="form-control" name="description"
                                                                  id="exampleFormControlTextarea1" rows="3"
                                                                  placeholder="توضیحات بنویسید"  > {{$video->desctiption}} </textarea>
                                                    </div>

                                                    {{--StartUploadFile--}}
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">آپلود ویدیو</label>
                                                        <label for="upload" class="file-upload__label">
                                                                          <span class="upload-product-img px-10 d-block">
                                                                                 <span class="file-upload">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="svg replaced-svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                                                                    <input id="upload" class="file-upload__input file" type="file" name="file" >
                                                                                   </span>
                                                                                    <span class="pera">یک تصویر را بکشید و رها کنید</span>
                                                                          </span>
                                                        </label>
                                                        @error('file') <small class="text-danger"> {{$message}} </small> @enderror

                                                        <div class="upload-product-media d-flex justify-content-between align-items-center mt-25">
                                                            <div id="file-info" class="upload-media-area d-flex align-items-center ms-10" style="display: none;">
                                                                <div class="upload-media-area__title d-flex flex-wrap align-items-center">
                                                                    <div>
                                                                        <p id="file-name" class="mb-0"></p>
                                                                        <span id="file-size" class="text-muted"></span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            document.getElementById("upload").addEventListener("change", function (event) {
                                                                let file = event.target.files[0];
                                                                if (file) {
                                                                    document.getElementById("file-name").textContent = file.name;
                                                                    document.getElementById("file-size").textContent = (file.size / 1024).toFixed(2) + " KB";
                                                                    document.getElementById("file-info").style.display = "flex";
                                                                }
                                                            });

                                                            document.getElementById("remove-file").addEventListener("click", function () {
                                                                document.getElementById("upload").value = "";
                                                                document.getElementById("file-info").style.display = "none";
                                                            });
                                                        </script>

                                                    </div>
                                                    {{--enduploadFile--}}



                                                    <div class="from-group d-flex justify-content-around">
                                                        <a  href="{{route('panel.home')}}"  class="btn btn-light btn-default btn-squared fw-400 text-capitalize">لغو</a>
                                                        <button type="submit"  class="btn btn-primary btn-default btn-squared text-capitalize">ذخیره </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
