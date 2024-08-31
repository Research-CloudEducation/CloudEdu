
@extends('layouts.app')

@section('navbar')
    @include('home.nav')
@endsection
@section('content')
  <div class="container mt-3">
    <div class="text-center mb-3">
        <h1>
            {{ trans('homepage.home-work') }}
        </h1>
    </div>
  </div>
    <div class="container">
        <div class="mt-4 m-auto">
                    <div class="card ">
                        <div class="card-body">
                            <div class="card-title">
                                <h1 class="text-center">{{ $content->title }}</h1>
                            </div>
                            <a href="#collapse-link" class="font-weight-semibold collapsed typo_link text-primary t-font-boldest" data-bs-toggle="collapse" aria-expanded="false">
                                {{ __('عرض ملف او صورة المحتوى ') }}
                            </a>
                        <div class="collapse" id="collapse-link">
                            <div class="mt-3">
                                <img class="card-img-left" src="{{ asset('upload/content/' . $content->image) }}" alt="">
                            </div>
                        </div>
                        </div>
                        <div class="card-footer">
                            <h3>{{ $content->content }}</h3>
                            <hr>
                            <div class=>
                                <h4>
                                    <a href="#collapse-link2" class="font-weight-semibold collapsed typo_link text-primary t-font-boldest" data-bs-toggle="collapse" aria-expanded="false">
                                        {{ __(' التعليقات المتعلقة بهذا المحتوى') }}</h4>
                                    </a>
                            </div>
                            <hr>
                            <div class="collapse" id="collapse-link2">
                                @foreach ($content->comments as $comment)
                                <small>  تم التعليق بواسطة  :  {{ $comment->student->name }} </small>
                                    <h5 class="muted-0">{{ $comment->comment }}</h5>
                                @endforeach
                            </div>
                            @if(Auth::guard('teacher')->check())
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
                                    <div class="card-title mb-3">اترك تعليق </div>
                                    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                            <input type="hidden" name="id" value="{{ Auth::guard('teacher')->check() ?? Auth::guard('teacher')->user()->id  }}">
                                            <input type="hidden" name="content_id" value="{{ $content->id }}">
                                            <div class="col-md-12 form-group mb-3">
                                                <label for="content">{{ trans('form.content') }}</label>
                                                <textarea name="comment" class="form-control form-control-rounded" id="" cols="30" rows="10"> Enter the content of sheets here </textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-lg w-full">Comment</button>
                                            </div>
                                    </form>
                                </div>
                            @elseif (Auth::guard('student')->check() && Auth::guard('student')->user()->aprrove = 1 )
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
                                    <div class="card-title mb-3 float-right">  اترك تعليق </div>
                                    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                            <input type="hidden" name="id" value="{{ Auth::guard('student')->check() ?? Auth::guard('student')->user()->id  }}">
                                            <input type="hidden" name="content_id" value="{{ $content->id }}">
                                            <div class="col-md-12 form-group mb-3">
                                                <label for="content">{{ trans('form.content') }}</label>
                                                <textarea name="comment" class="form-control form-control-rounded" id="" cols="30" rows="10"> Enter the content of sheets here </textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-lg w-full">تعليق</button>
                                            </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
        </div>
    </div>
       
  
        </div>
    </div>
@endsection