@extends('layouts.app')

@section('navbar')
    @include('home.nav')
@endsection
@section('content')

        <!-- CARD ICON -->
        <div class="container">
            <div class="mt-4 text-bold text-center " style="font-size: x-large"> 
                <h1>{{ trans('homepage.courses') }}</h1>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 col-md-12">
                    <div class="row">
                            @foreach ($classLevels as $class)
                                {{-- @foreach ($classLevels as $item)
                                @endforeach --}}
                                {{-- @for ($i = $category->class_id; $i <= $classLevels->count(); $i++) --}}
                                
                                <p class="text-22 text-center">{{ $class->name }}</p>
                                @foreach ($categories as $category)
                                   @if ($class->id == $category->class_id)
                                       
                                                 
                                    <div class="col-md-4">
                                        <div class="card card-icon mb-4">
                                            <div class="card-body text-center">
                                                <i class="fa fa-4x fa-book-open"></i>
                                                <h4 class="text-muted mt-2 text-25 mb-2">{{ $category->name }}</h4>
                                              
                                                <p class="lead text-22 m-0">{{ $category->classlevel->name }}</p>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="text-muted mt-2 text-capitalize text-center">
                                                        <a href="" class="btn btn-primary btn-lg  "> All Excersice Sheets In This Book </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="fa  fa-divide"></div> --}}
        
                                    </div>
                                    {{-- @endfor --}}
                                    @endif 
                            @endforeach
                            @endforeach

                        {{-- <div class="col-md-4">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="fa fa-book-reader fa-xl"></i>
                                    <p class="text-muted mt-2 mb-2">New Users</p>
                                    <p class="lead text-22 m-0">21</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Money-2"></i>
                                    <p class="text-muted mt-2 mb-2">Total sales</p>
                                    <p class="lead text-22 m-0">4021</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-icon-big mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Money-2"></i>
                                    <p class="lead text-18 mt-2 mb-0">4021</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-icon-big mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Gear"></i>
                                    <p class="lead text-18 mt-2 mb-0">4021</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-icon-big mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Bell"></i>
                                    <p class="lead text-18 mt-2 mb-0">4021</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
               </div>
        </div>
@endsection