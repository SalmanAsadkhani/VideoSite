@extends('layout')
@section('content')
    <div id="upload">
        <div class="container">
            <div class="row ">

               <div class="col-md-8 bg-dark p-5 ">
                   <h1 class="page-title"><span>آپلود</span> ویدیو</h1>
                   <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf

                       <div class="d-flex flex-column gap-2">
                           <div class="col-md-10">
                               <label>@lang('videos.name')</label>
                               <input name="name" type="text" class="form-control form" value="{{ old('name') }}"
                                      placeholder="@lang('videos.name')">

                               @error('name') <small class="alert alert-danger p-1 me-3"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror
                           </div>

                           <div class="col-md-10">
                               <label>نام یکتا</label>
                               <input type="text" name="slug" class="form-control form" value="{{ old('slug') }}"
                                      placeholder="نام یکتا">

                               @error('slug') <small class="alert alert-danger p-1 me-3"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror
                           </div>

                           <div class="col-md-10">
                               <label>آپلود ویدیو</label>
                               <input type="file" name="file" class="form-control form " style="display: block">
                               @error('file') <small class="alert alert-danger p-1 me-3"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror
                           </div>

                           <div class="col-md-10">
                               <label>دسته‌بندی</label>
                               @error('category_id') <small class="alert alert-danger p-1 me-3"><i class="fa fa-exclamation-circle"></i> {{$message}} </small>@enderror

                               <select class="form-control form" name="category_id" id="category">
                                   @foreach ($categories as $category)
                                       <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                   @endforeach
                               </select>
                           </div>

                           <div class="col-md-10">
                               <label>توضیحات</label>
                               <textarea class="form-control form" name="description" rows="4"
                                         placeholder="توضیح">{{ old('description') }}</textarea>
                           </div>

                           <div class="btn bg-danger text-light w-50 text-center p-0  ">
                               <button type="submit" id="contact_submit" class="btn btn-dm text-light border-0 ">ذخیره</button>
                           </div>
                       </div>

                   </form>
               </div>

               <div class="col-md-4">
                   <a href="#"><img src="{{ asset('img/upload-adv.png') }}" alt=""></a>
               </div>
           </div>

        </div>
    </div>
@endsection
