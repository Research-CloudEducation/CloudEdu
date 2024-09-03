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
                    <h1>{{ __('homepage.m-profile') }}</h1>
                    <ul>
                        <li><a href="">Pages</a></li>
                        <li>student Profile</li>
                    </ul>
                </div>
            <div class="card user-profile o-hidden mb-4">
                <div class="header-cover" style="background-image: url({{asset('assets/images/photo-wide-5.jpeg')}}"></div>
                <div class="user-info">
                    <img class="profile-picture avatar-lg mb-2" src="{{ Auth::guard('student')->user()->profile ? asset('upload/profile/' .Auth::guard('student')->user()->profile) : asset('assets/images/faces/1.jpg') }}" alt="">
                    @if(Auth::guard('student')->check() && !Auth::guard('student')->user()->approve )
                    <p class="alert alert-danger text-sm-center">{{ __(' لم يتم موافق على نشاط حسابك بعد يستم الموافق   عليه حين الراجعة من قبل الوكيل ') }}</p>
                        <p class="m-0 text-24">
                            {{ Auth::guard('student')->user()->name }}
                        </p>
                        @elseif (Auth::guard('student')->check())
                        <p class="m-0 text-24">
                            {{ Auth::guard('student')->user()->name }}
                        </p>
                            
                        @endif
                        
                    </p>
                    <p class="text-muted m-0" style="font-size: x-large">{{ trans('homepage.student-in') }} : {{ Auth::guard('student')->user()->school->name }}</p>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">{{ __('المعلومات الشخصية') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="homework-tab" data-toggle="tab" href="#homework" role="tab" aria-controls="homework" aria-selected="false">{{ __('الواجبات') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">{{ __('تعديل المعلومات') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="friends-tab" data-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false">Friends</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="profileTabContent">
                        <div class="tab-pane fade " id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                            <ul class="timeline clearfix">
                                <li class="timeline-line"></li>
                                <li class="timeline-item">
                                    <div class="timeline-badge">
                                        <i class="badge-icon bg-primary text-white i-Cloud-Picture"></i>
                                    </div>
                                    <div class="timeline-card card">
                                        <div class="card-body">
                                            <div class="mb-1">
                                                <strong class="me-1">Timothy Carlson</strong> added a new photo
                                                <p class="text-muted">3 hours ago</p>
                                            </div>
                                            <img class="rounded mb-2" src="{{ Auth::guard('student')->user()->profile }}" alt="">
                                            <div class="mb-3">
                                                <a href="#" class="me-1">Like</a>
                                                <a href="#">Comment</a>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Write comment" aria-label="comment" >
                                                <button class="btn btn-primary" type="button" id="button-comment1">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-badge">
                                        <img class="badge-img" src="{{asset('assets/images/faces/1.jpg')}}" alt="">
                                    </div>
                                    <div class="timeline-card card">
                                        <div class="card-body">
                                            <div class="mb-1">
                                                <strong class="me-1">Timothy Carlson</strong> updated his sattus
                                                <p class="text-muted">16 hours ago</p>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi dicta beatae illo illum iusto iste mollitia explicabo quam officia. Quas ullam, quisquam architecto aspernatur enim iure debitis dignissimos suscipit
                                                ipsa.
                                            </p>
                                            <div class="mb-3">
                                                <a href="#" class="me-1">Like</a>
                                                <a href="#">Comment</a>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Write comment" aria-label="comment" >
                                                <button class="btn btn-primary" type="button" id="button-comment">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="timeline clearfix">
                                <li class="timeline-line"></li>
                                <li class="timeline-group text-center">
                                    <button class="btn btn-icon-text btn-primary"><i class="i-Calendar-4"></i> 2018</button>
                                </li>
                            </ul>
                            <ul class="timeline clearfix">
                                <li class="timeline-line"></li>
                                <li class="timeline-item">
                                    <div class="timeline-badge">
                                        <i class="badge-icon bg-danger text-white i-Love-User"></i>
                                    </div>
                                    <div class="timeline-card card">
                                        <div class="card-body">
                                            <div class="mb-1">
                                                <strong class="me-1">New followers</strong>
                                                <p class="text-muted">2 days ago</p>
                                            </div>
                                            <p><a href="#">Henry krick</a> and 16 others followed you</p>
                                            <div class="mb-3">
                                                <a href="#" class="me-1">Like</a>
                                                <a href="#">Comment</a>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Write comment" aria-label="comment" >
                                                <button class="btn btn-primary" type="button" id="button-comment3">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-badge">
                                        <i class="badge-icon bg-primary text-white i-Cloud-Picture"></i>
                                    </div>
                                    <div class="timeline-card card">
                                        <div class="card-body">
                                            <div class="mb-1">
                                                <strong class="me-1">Timothy Carlson</strong> added a new photo
                                                <p class="text-muted">2 days ago</p>
                                            </div>
                                            <img class="rounded mb-2" src="{{asset('assets/images/photo-wide-2.jpg')}}" alt="">
                                            <div class="mb-3">
                                                <a href="#" class="me-1">Like</a>
                                                <a href="#">Comment</a>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Write comment" aria-label="comment" >
                                                <button class="btn btn-primary" type="button" id="button-comment4">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="timeline clearfix">
                                <li class="timeline-line"></li>
                                <li class="timeline-group text-center">
                                    <button class="btn btn-icon-text btn-warning"><i class="i-Calendar-4"></i> Joined
                                        in 2013
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <h4>{{ __('المعلومات الشخصية') }} </h4>
                            <p>
                                علان الضغوط و تعد, إنطلاق بريطانيا أم بين. بين بلاده العظمى ولكسمبورغ من. من الا لدحر أحدث, و أساسي وانهاء السيطرة بعد, كلا هو ووصف علاقة. دأبوا لفرنسا اسبوعين بـ إيو, ولم أحدث شواطيء لم. ضرب ٣٠ بداية فشكّل ويكيبيديا, و لها الأثنان استرجاع, عن مدن معارضة وانتهاءً. ما مسارح بريطانيا-فرنسا فصل. وسفن تصرّف إحتار أم تعد, لم بينما وبغطاء بال, دنو تم سقطت وإعلان.
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Calendar text-16 me-1"></i> {{ trans('form.address') }}</p>
                                        <span>{{ Auth::guard('student')->user()->address }}</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Edit-Map text-16 me-1"></i> {{ trans('form.phone') }}</p>
                                        <span>Dhaka, DB</span>
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
                                        <span>{{ Auth::guard('student')->user()->email }}</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 me-1"></i> Website</p>
                                        <span>www.ui-lib.com</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 me-1"></i> Profession</p>
                                        <span>Digital Marketer</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Professor text-16 me-1"></i> Experience</p>
                                        <span>8 Years</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Home1 text-16 me-1"></i> School</p>
                                        <span>School of{{ Auth::guard('student')->user()->school->name }}</span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                           
                        </div>

                        <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card card-profile-1 mb-4">
                                        <div class="card-body text-center">
                                            <div class="avatar box-shadow-2 mb-3">
                                                <img src="{{asset('assets/images/faces/16.jpg')}}" alt="">
                                            </div>
                                            <h5 class="m-0">Jassica Hike</h5>
                                            <p class="mt-0">UI/UX Designer</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae cumque.
                                            </p>
                                            <button class="btn btn-primary btn-rounded">Contact Jassica</button>
                                            <div class="card-socials-simple mt-4">
                                                <a href="">
                                                    <i class="i-Linkedin-2"></i>
                                                </a>
                                                <a href="">
                                                    <i class="i-Facebook-2"></i>
                                                </a>
                                                <a href="">
                                                    <i class="i-Twitter"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card card-profile-1 mb-4">
                                        <div class="card-body text-center">
                                            <div class="avatar box-shadow-2 mb-3">
                                                <img src="{{asset('assets/images/faces/2.jpg')}}" alt="">
                                            </div>
                                            <h5 class="m-0">Frank Powell</h5>
                                            <p class="mt-0">UI/UX Designer</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae cumque.
                                            </p>
                                            <button class="btn btn-primary btn-rounded">Contact Frank</button>
                                            <div class="card-socials-simple mt-4">
                                                <a href="">
                                                    <i class="i-Linkedin-2"></i>
                                                </a>
                                                <a href="">
                                                    <i class="i-Facebook-2"></i>
                                                </a>
                                                <a href="">
                                                    <i class="i-Twitter"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card card-profile-1 mb-4">
                                        <div class="card-body text-center">
                                            <div class="avatar box-shadow-2 mb-3">
                                                <img src="{{asset('assets/images/faces/3.jpg')}}" alt="">
                                            </div>
                                            <h5 class="m-0">Arthur Mendoza</h5>
                                            <p class="mt-0">UI/UX Designer</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae cumque.
                                            </p>
                                            <button class="btn btn-primary btn-rounded">Contact Arthur</button>
                                            <div class="card-socials-simple mt-4">
                                                <a href="">
                                                    <i class="i-Linkedin-2"></i>
                                                </a>
                                                <a href="">
                                                    <i class="i-Facebook-2"></i>
                                                </a>
                                                <a href="">
                                                    <i class="i-Twitter"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-3">
                                    <div class="card card-profile-1 mb-4">
                                        <div class="card-body text-center">
                                            <div class="avatar box-shadow-2 mb-3">
                                                <img src="{{asset('assets/images/faces/4.jpg')}}" alt="">
                                            </div>
                                            <h5 class="m-0">Jacqueline Day</h5>
                                            <p class="mt-0">UI/UX Designer</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae cumque.
                                            </p>
                                            <button class="btn btn-primary btn-rounded">Contact Jacqueline</button>
                                            <div class="card-socials-simple mt-4">
                                                <a href="">
                                                    <i class="i-Linkedin-2"></i>
                                                </a>
                                                <a href="">
                                                    <i class="i-Facebook-2"></i>
                                                </a>
                                                <a href="">
                                                    <i class="i-Twitter"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                                        <div class="max-w-3xl">
                                            <section>
                                                <form method="post" action="{{ route('admin.students.update' , $student->id) }}" class="mt-6 space-y-6">
                                                    @csrf
                                                    @method('patch')
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
                                                                <x-text-input id="name" name="name_ar" type="text" class="mt-1 block w-full" :value="$student->name"  autofocus autocomplete="name" />
                                                                <x-input-error class="mt-2" :messages="$errors->get('name_ar')" />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col">
                                                            <div>
                                                                <x-input-label for="name_en" :value="trans('form.name_en')  "  /> 
                                                                <x-text-input id="name" name="name_en" type="text" class="mt-1 block w-full" :value="$student->attrBylocale('en' , 'name')"  autofocus autocomplete="name" />
                                                                <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                                                            </div>
                                                        </div>
                                                            
                                                      </div>
                              
                                                    <div>
                                                        <x-input-label for="email" :value="trans('form.email') " />
                                                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="$student->email"  autocomplete="email" />
                                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="password" :value="trans('form.password') " />
                                                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="$student->password" autocomplete="new-password" />
                                                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="password" :value="trans('form.confirmpassword') " />
                                                        <x-text-input id="password" name="password_confirmation" type="password" class="mt-1 block w-full" :value="$student->password" autocomplete="new-password" />
                                                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="description_en" :value="trans('form.phone') " />
                                                        <x-text-input id="text" name="phone" type="text" class="mt-1 block w-full" :value="$student->phone" autocomplete="phone" />
                                                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="address" :value="trans('form.address') " />
                                                        <x-text-input id="text" name="address" type="text" class="mt-1 block w-full" :value="$student->address"  autocomplete="address" />
                                                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="school_id" :value="trans('form.FromSchool') " />
                                                        <select name="school_id" id="" class="custom-select custom-select-lg mb-3">
                                                            <option selected></option>
                                                            @foreach ($schools as $school)
                                                                <option value="{{ $school->id }}" {{ $school->id == $student->school_id ? 'selected' : '' }}>{{ $school->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <x-input-error class="mt-2" :messages="$errors->get('school_id')" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="class_id" :value="trans('form.classLevel') " />
                                                        <select name="class_id" id="" class="custom-select custom-select-lg mb-3">
                                                            <option selected></option>
                                                            @foreach ($classLevel as $class)
                                                                <option value="{{ $class->id }}" {{ $class->id == $student->class_id? 'selected' : '' }}>{{ $class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <x-input-error class="mt-2" :messages="$errors->get('class_id')" />
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
                        <div class="tab-pane fade" id="homework" role="tabpanel" aria-labelledby="homework-tab">
                            <!-- TO DO List -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <ul class="pagination pagination-sm">
                            <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                        </ul>
                    </div>
                    <h3 class="">
                        <i class="ion ion-clipboard mr-1"></i>
                        {{ __('قائمــة الواجبــات ') }}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul class="todo-list" data-widget="todo-list">
                       @foreach ($comments as $comment)
                       <li>
                        <!-- drag handle -->
                        <span class="handle">
                            <i class="fas fa-ellipsis-v"></i>
                            <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <!-- checkbox -->
                        <div class="icheck-primary d-inline ml-2">
                            <input type="checkbox" value="" name="todo1" checked id="todoCheck1">
                            <label for="todoCheck1"></label>
                        </div>
                        <!-- todo text -->
                        <span class="text">{{ $comment->content->title }}  : {{ __('في مادة') }} :-> {{ $comment->content->category->name }}</span>
                        <!-- Emphasis label -->
                        <small class="badge badge-info"><i class="far fa-clock"></i> {{ $comment->content->created_at->toFormattedDateString() }}</small>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                            <i class="fas fa-edit"></i>
                            <i class="fas fa-trash-o"></i>
                        </div>
                    </li>
                       @endforeach
                        {{-- <li>
                            <span class="handle">
                                <i class="fas fa-ellipsis-v"></i>
                                <i class="fas fa-ellipsis-v"></i>
                            </span>
                            <div class="icheck-primary d-inline ml-2">
                                <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                                <label for="todoCheck2"></label>
                            </div>
                            <span class="text">Make the theme responsive</span>
                            <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fas fa-edit"></i>
                                <i class="fas fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                            <span class="handle">
                                <i class="fas fa-ellipsis-v"></i>
                                <i class="fas fa-ellipsis-v"></i>
                            </span>
                            <div class="icheck-primary d-inline ml-2">
                                <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                <label for="todoCheck3"></label>
                            </div>
                            <span class="text">Let theme shine like a star</span>
                            <small class="badge badge-warning"><i class="far fa-clock"></i> 1
                                day</small>
                            <div class="tools">
                                <i class="fas fa-edit"></i>
                                <i class="fas fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                            <span class="handle">
                                <i class="fas fa-ellipsis-v"></i>
                                <i class="fas fa-ellipsis-v"></i>
                            </span>
                            <div class="icheck-primary d-inline ml-2">
                                <input type="checkbox" value="" name="todo4" id="todoCheck4">
                                <label for="todoCheck4"></label>
                            </div>
                            <span class="text">Let theme shine like a star</span>
                            <small class="badge badge-success"><i class="far fa-clock"></i> 3
                                days</small>
                            <div class="tools">
                                <i class="fas fa-edit"></i>
                                <i class="fas fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                            <span class="handle">
                                <i class="fas fa-ellipsis-v"></i>
                                <i class="fas fa-ellipsis-v"></i>
                            </span>
                            <div class="icheck-primary d-inline ml-2">
                                <input type="checkbox" value="" name="todo5" id="todoCheck5">
                                <label for="todoCheck5"></label>
                            </div>
                            <span class="text">Check your messages and notifications</span>
                            <small class="badge badge-primary"><i class="far fa-clock"></i> 1
                                week</small>
                            <div class="tools">
                                <i class="fas fa-edit"></i>
                                <i class="fas fa-trash-o"></i>
                            </div>
                        </li>
                        <li>
                            <span class="handle">
                                <i class="fas fa-ellipsis-v"></i>
                                <i class="fas fa-ellipsis-v"></i>
                            </span>
                            <div class="icheck-primary d-inline ml-2">
                                <input type="checkbox" value="" name="todo6" id="todoCheck6">
                                <label for="todoCheck6"></label>
                            </div>
                            <span class="text">Let theme shine like a star</span>
                            <small class="badge badge-secondary"><i class="far fa-clock"></i> 1
                                month</small>
                            <div class="tools">
                                <i class="fas fa-edit"></i>
                                <i class="fas fa-trash-o"></i>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i>
                        Add item</button>
                </div>
            </div>
            <!-- /.card -->
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
