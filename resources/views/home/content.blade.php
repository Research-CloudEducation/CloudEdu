
@extends('layouts.app')

@section('navbar')
    @include('home.nav')
@endsection
@section('content')
  <div class="container mt-3">
    <div class="text-center mb-3">
        <h1>
            <i class="fa fa-4 fa-book"></i>   {{ trans('homepage.home-work') }} 
        </h1>
    </div>
  </div>
    <div class="mt-4 m-auto">
        <div class="row m-auto">
            <div class="col-lg-6 col-md-12">
                @foreach ($contents as $content)
                <div class="col-md-12">
                    <div class="card card-ecommerce-3 o-hidden mb-4">
                        <div class="d-flex flex-column flex-sm-row">
                            <div class="" >
                                <img class="card-img-left" style="width: 390px ; height:220px" src="{{ ($content->image != null )  ?  asset('upload/content/' . $content->image) : 'http://127.0.0.1:8001/assets/images/photo-wide-2.jpg' }}" alt="">
                            </div>
                            <div class="flex-grow-1 p-4">
                                <h5 class="m-0 text-20">{{ $content->title }}</h5>
                                <h6 class="text-bold mt-2 ">  {{ __('table.category-name') }} : {{ $content->category->name }}</h6>
                                <h6 class="text-bold ">  {{ __('table.classLevel') }} : {{ $content->classLevel->name }}</h6>
                                <p class="text-muted mt-3">{{ Str::limit($content->content , 100) }}</p>
                                <a download="{{ asset('upload/content/' . $content->category->file) }}" href="{{ asset('upload/content/' . $content->category->file) }}">
                                    <button type="button" class="btn btn-raised btn-raised-primary m-1">
                                        {{ trans('homepage.downlaod') }}
                                    </button>
                                </a>
                                <a href="{{ asset('upload/content/' . $content->category->file) }}" target="_blank">
                                    <button type="button" class="btn btn-raised btn-raised-secondary m-1">
                                         {{ trans('homepage.read') }}
                                    </button>
                                </a>
                                <a href="{{ route('get-content' , $content->id) }}">
                                    <button type="button" class="btn btn-raised btn-raised-success m-1">
                                        {{ trans('homepage.view-more') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            
            @if(Auth::guard('teacher')->check())
                
            
            {{-- <div class="col-lg-6 col-md-12">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                            <div class="alert alert-danger alert-dismissible">
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="card-title mb-3">uplaods new Excerise </div>
                            <form action="{{ route('get-contents.store') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                    <input type="hidden" name="id" value="{{ Auth::guard('teacher')->user()->id ?? Auth::guard('teacher')->user()->id }}">
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="title">{{ trans('form.title') }}</label>
                                        <input type="text" class="form-control form-control-rounded" id="title" name="title" placeholder="Enter your first name">
                                    </div>
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="image">{{ trans('form.image') }}</label>
                                        <input type="file" name="image" class="form-control form-control-rounded" id="image" >
                                    </div>
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="content">{{ trans('form.content') }}</label>
                                        <textarea name="content" class="form-control form-control-rounded" id="" cols="30" rows="10"> Enter the content of sheets here </textarea>
                                    </div>
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="class_id">{{ trans('form.subject') }}</label>
                                        <select name="class_id" class="form-control form-control-rounded">
                                            <option selected></option>
                                            @foreach ($classLevels as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="category_id">{{ trans('form.subject') }}</label>
                                        <select name="category_id" class="form-control form-control-rounded">
                                            <option selected></option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                         <button type="submit" class="btn btn-primary btn-lg w-full">uplaod</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
            @endif
            {{-- <div class="col-lg-6 col-md-12">
                <div class="col-md-12">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni earum exercitationem natus 
                    blanditiis cupiditate consequuntur quos ea omnis illum
                     quibusdam quisquam voluptatum, modi aperiam, expedita, nulla odio magnam beatae nam?
                </div>
            </div> --}}
        </div>
    </div>
@endsection