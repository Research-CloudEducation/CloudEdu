@extends('layouts.app')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection
@section('navbar')
    @include('home.nav')
@endsection
@section('content')
   

            <div class="separator-breadcrumb border-top"></div>
 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-3xl">
                <div class="breadcrumb">
                    <h1>{{ trans('homepage.m-profile') }}</h1>
                    <ul>
                        <li><a href="">Pages</a></li>
                        <li>{{ trans('homepage.m-profile') }}</li>
                    </ul>
                </div>
            <div class="card user-profile o-hidden mb-4">
                <div class="header-cover" style="background-image: url({{asset('assets/images/photo-wide-5.jpeg')}}"></div>
                <div class="user-info">
                    <img class="profile-picture avatar-lg mb-2" src="{{asset('assets/images/faces/1.jpg')}}" alt="">
                    <p class="m-0 text-24">
                        @if (Auth::guard('teacher')->check())
                        {{ Auth::guard('teacher')->user()->name }}
                            
                        @elseif($teacher)
                        {{ $teacher->name }}
                        @endif
                    </p>
                    <p class="text-muted m-0 text-bold " style="font-size: x-large">{{ trans('homepage.teacher-in') }} => {{ Auth::guard('teacher')->user()->school->name ?? $teacher->school->name }}</p>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">
                        <li class="nav-item">
                            @if (Auth::guard('teacher')->check())
                                 <a class="nav-link " id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true">{{ trans('homepage.home-work') }}</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">About</a>
                        </li>
                        <li class="nav-item">
                            @if (Auth::guard('teacher')->check())
                            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="true">{{ Auth::guard('teacher')->check() ? __('تعديل المعلومات') : '' }}</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Photos</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="profileTabContent">
                        <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                            <div class="row m-auto">
                               
                            
                            @if(Auth::guard('teacher')->check())
                            <div class="col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-header text-16">
                                        {{ __('المحتويات التعلبمية السابقة ') }}
                                    </div>
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">

                                            <thead>
                                                <tr>
                                                    <td>{{ __('form.title') }}</td>
                                                    <td>{{ __('table.category-name') }}</td>
                                                    <td>{{ __('table.classLevel') }}</td>
                                                    <td>{{ __('table.create-date') }}</td>
                                                    <td>{{ __('عدد الطلبة الشاركين') }}</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!is_null($teacherContent))
                                                    @foreach ($teacherContent as $content)
                                                        <tr>
                                                            <td><a href="{{ route('get-content' , $content->id) }}">{{ $content->title }}</a></td>
                                                            <td>{{ $content->category->name }}</td>
                                                            <td>{{ $content->classLevel->name}}</td>
                                                            <td> {{ $content->created_at->toFormattedDateString() }}</td>
                                                            <td> {{ $content->comments->count() }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-lg-6 col-md-12">
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
                                                        <label for="category_id">{{ trans('form.subject') }}</label>
                                                        <select name="category_id" class="form-control form-control-rounded">
                                                            <option selected></option>
                                                            @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 form-group mb-3">
                                                        <label for="class_id">{{ trans('table.classLevel') }}</label>
                                                        <select name="class_id" class="form-control form-control-rounded">
                                                            <option selected></option>
                                                            @foreach ($classLevels as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                                
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
                            </div>
                            @endif
                        </div>
                    </div>
                        <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <h4>Personal Information</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, commodi quam! Provident quis voluptate asperiores ullam, quidem odio pariatur. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem, nulla eos?
                                Cum non ex voluptate corporis id asperiores doloribus dignissimos blanditiis iusto qui repellendus deleniti aliquam, vel quae eligendi explicabo.
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Calendar text-16 me-1"></i> {{ trans('form.address') }}</p>
                                        <span>{{  Auth::guard('teacher')->user()->address ?? $teacher->address }}</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Edit-Map text-16 me-1"></i>{{ trans('form.phone') }}</p>
                                        <span>{{  Auth::guard('teacher')->user()->phone ?? $teacher->phone }}</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Globe text-16 me-1"></i> Lives In</p>
                                        <span>Dhaka, DB</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-MaleFemale text-16 me-1"></i> Gender</p>
                                        <span>1 Jan, 1994</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-MaleFemale text-16 me-1"></i> Email</p>
                                        <span>{{ Auth::guard('teacher')->user()->email ?? $teacher->email }}</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 me-1"></i> Website</p>
                                        <span>www.ui-lib.com</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 me-1"></i> Profession</p>
                                        {{-- <span>{{ Auth::guard('teacher')->user()->rank ?? $teacher->rank }}</span> --}}
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Professor text-16 me-1"></i> Experience</p>
                                        <span>8 Years</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Home1 text-16 me-1"></i> School</p>
                                        <span>{{ Auth::guard('teacher')->user()->school->name ?? $teacher->school->name }}</span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>Other Info</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum dolore labore reiciendis ab quo ducimus reprehenderit natus debitis, provident ad iure sed aut animi dolor incidunt voluptatem. Blanditiis, nobis aut.</p>
                            {{-- <div class="row">
                                <div class="col-md-2 col-sm-4 col-6 text-center">
                                    <i class="i-Plane text-32 text-primary"></i>
                                    <p class="text-16 mt-1">Travelling</p>
                                </div>
                                <div class="col-md-2 col-sm-4 col-6 text-center">
                                    <i class="i-Camera text-32 text-primary"></i>
                                    <p class="text-16 mt-1">Photography</p>
                                </div>
                                <div class="col-md-2 col-sm-4 col-6 text-center">
                                    <i class="i-Car-3 text-32 text-primary"></i>
                                    <p class="text-16 mt-1">Driving</p>
                                </div>
                                <div class="col-md-2 col-sm-4 col-6 text-center">
                                    <i class="i-Gamepad-2 text-32 text-primary"></i>
                                    <p class="text-16 mt-1">Gaming</p>
                                </div>
                                <div class="col-md-2 col-sm-4 col-6 text-center">
                                    <i class="i-Music-Note-2 text-32 text-primary"></i>
                                    <p class="text-16 mt-1">Music</p>
                                </div>
                                <div class="col-md-2 col-sm-4 col-6 text-center">
                                    <i class="i-Shopping-Bag text-32 text-primary"></i>
                                    <p class="text-16 mt-1">Shopping</p>
                                </div>
                            </div> --}}
                        </div>

                        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                                        <div class="max-w-3xl">
                                            <section>
                                                <form method="post" action="{{ route('admin.teachers.update' , Auth::guard('teacher')->user()->id) }}" class="mt-6 space-y-6">
                                                    @csrf
                                                    @method('PATCH')
                                                    @if(session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @elseif (session('error'))
                                                        <div class="alert alert-danger">
                                                            {{ session('error') }}
                                                        </div>
                                                    @endif
                               
                                                      <div class="row">
                                                        <div class="col">
                                                            <div >
                                                                <x-input-label for="name_ar" :value=" trans('form.name_ar') " />
                                                                <x-text-input id="name" name="name_ar" type="text" class="mt-1 block w-full" :value="$teacher->name"  autofocus autocomplete="name" />
                                                                <x-input-error class="mt-2" :messages="$errors->get('name_ar')" />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col">
                                                            <div>
                                                                <x-input-label for="name_en" :value="trans('form.name_en')  "  /> 
                                                                <x-text-input id="name" name="name_en" type="text" class="mt-1 block w-full" :value="$teacher->attrByLocale('en' , 'name')"  autofocus autocomplete="name" />
                                                                <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                                                            </div>
                                                        </div>
                                                            
                                                      </div>
                              
                                                    <div>
                                                        <x-input-label for="email" :value="trans('form.email') " />
                                                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="$teacher->email"  autocomplete="email" />
                                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="password" :value="trans('form.password') " />
                                                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="$teacher->password" autocomplete="new-password" />
                                                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="password" :value="trans('form.confirmpassword') " />
                                                        <x-text-input id="password" name="password_confirmation" type="password" class="mt-1 block w-full" :value="$teacher->password" autocomplete="new-password" />
                                                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="description_en" :value="trans('form.phone') " />
                                                        <x-text-input id="text" name="phone" type="text" class="mt-1 block w-full" :value="$teacher->phone" autocomplete="phone" />
                                                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="address" :value="trans('form.address') " />
                                                        <x-text-input id="text" name="address" type="text" class="mt-1 block w-full" :value="$teacher->address"  autocomplete="address" />
                                                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="description_en" :value="trans('form.FromSchool') " />
                                                        <select name="school_id" id="" class="custom-select custom-select-lg mb-3">
                                                            <option selected></option>
                                                            @foreach ($schools as $school)
                                                                <option value="{{ $school->id }}" {{ $school->id == $teacher->school_id ? 'selected' : ''}}>{{ $school->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <x-input-error class="mt-2" :messages="$errors->get('school_id')" />
                                                    </div>
                                                    <div class="flex items-center gap-4">
                                                        <x-primary-button>{{ trans('form.edit') }}</x-primary-button>
                                            
                                                    
                                                    </div>
                                                </form>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                        <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card text-white o-hidden mb-3">
                                        <img class="card-img" src="{{asset('assets/images/products/headphone-1.jpg')}}" alt="">
                                        <div class="card-img-overlay">
                                            <div class="p-1 text-start card-footer font-weight-light d-flex">
                                                <span class="me-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 me-1"></i>
                                                    12 </span>
                                                <span class="d-flex align-items-center"><i class="i-Calendar-4 me-2"></i>03.12.2018</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card text-white o-hidden mb-3">
                                        <img class="card-img" src="{{asset('assets/images/products/headphone-2.jpg')}}" alt="">
                                        <div class="card-img-overlay">
                                            <div class="p-1 text-start card-footer font-weight-light d-flex">
                                                <span class="me-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 me-1"></i>
                                                    12 </span>
                                                <span class="d-flex align-items-center"><i class="i-Calendar-4 me-2"></i>03.12.2018</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card text-white o-hidden mb-3">
                                        <img class="card-img" src="{{asset('assets/images/products/headphone-3.jpg')}}" alt="">
                                        <div class="card-img-overlay">
                                            <div class="p-1 text-start card-footer font-weight-light d-flex">
                                                <span class="me-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 me-1"></i>
                                                    12 </span>
                                                <span class="d-flex align-items-center"><i class="i-Calendar-4 me-2"></i>03.12.2018</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white o-hidden mb-3">
                                        <img class="card-img" src="{{asset('assets/images/products/iphone-1.jpg')}}" alt="">
                                        <div class="card-img-overlay">
                                            <div class="p-1 text-start card-footer font-weight-light d-flex">
                                                <span class="me-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 me-1"></i>
                                                    12 </span>
                                                <span class="d-flex align-items-center"><i class="i-Calendar-4 me-2"></i>03.12.2018</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white o-hidden mb-3">
                                        <img class="card-img" src="{{asset('assets/images/products/iphone-2.jpg')}}" alt="">
                                        <div class="card-img-overlay">
                                            <div class="p-1 text-start card-footer font-weight-light d-flex">
                                                <span class="me-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 me-1"></i>
                                                    12 </span>
                                                <span class="d-flex align-items-center"><i class="i-Calendar-4 me-2"></i>03.12.2018</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white o-hidden mb-3">
                                        <img class="card-img" src="{{asset('assets/images/products/watch-1.jpg')}}" alt="">
                                        <div class="card-img-overlay">
                                            <div class="p-1 text-start card-footer font-weight-light d-flex">
                                                <span class="me-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 me-1"></i>
                                                    12 </span>
                                                <span class="d-flex align-items-center"><i class="i-Calendar-4 me-2"></i>03.12.2018</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
 </div>


@endsection

@section('page-js')
 <script src="{{asset('assets/js/vendor/spin.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/ladda.js')}}"></script>
<script src="{{asset('assets/js/ladda.script.js')}}"></script>
@endsection
