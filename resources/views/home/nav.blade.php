
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
                <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                    <h2 class="m-0 text-primary"><i class="fa fa-book-open me-3 mr-2"></i>{{ trans('homepage.teach-me') }} </h2>
                </a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    {{ trans('home.lang') }}
                    </a>
                    <div class="dropdown dropdown-menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                           
                            <a class="dropdown-item " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                    
                    </div>
                </div>
                <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto p-4 p-lg-0">
                        <a href="{{ url('/') }}" class="nav-item nav-link active">{{ trans('homepage.home') }}</a>
                        <a href="/" class="nav-item nav-link">{{ trans('homepage.about') }}</a>
                        <div class="nav-item dropdown">
                            <a href="{{ route('categories.index') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ trans('homepage.courses') }}</a>
                                <div class="dropdown-menu fade-down m-0">
                                    @foreach ($categories as $category)
                                    <a href="{{ route('categories.index') }}" class="dropdown-item">{{ $category->name }}</a> 
                                    @endforeach
                                </div>
                        </div>
                        <!-- add task -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tasks</a>

                        <div class="dropdown-menu fade-down m-0">
                            <a href="#" class="dropdown-item"><i class="i-Folders"></i>All Tasks </a>
                            <a href="#" class="dropdown-item"><i class="i-Add-File"></i> Active Tasks</a>
                            <a href="#" class="dropdown-item"><i class="i-File-Favorite"> </i> Closed Tasks</a>
                            <a href="#" class="dropdown-item"><i class="i-Administrator"> </i> Assigned To Me <span class="badge text-bg-primary badge-pill ms-4">14</span></a>
                            <a href="#" class="dropdown-item"><i class="i-Conference"></i> Assigned To My Team <span class="badge text-bg-primary badge-pill ms-4">14</span></a>
                            <a href="#" class="dropdown-item"><i class="i-Gears"> </i>Settings </a>
                        </div>

 <!-- end of Tasks -->
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ trans('homepage.schools') }}</a>
                            <div class="dropdown-menu fade-down m-0">
                                @foreach ($schools as $school)
                                    
                                <a href="/" class="dropdown-item">{{ $school->name }}</a>
                                @endforeach
                                {{-- <a href="/" class="dropdown-item">Testimonial</a> --}}
                                <a href="{{ route('userProfile') }}" class="dropdown-item">{{ __('userProfile') }}</a>
                            </div>
                        </div>
                        <a href="/" class="nav-item nav-link">{{ trans('homepage.contact') }}</a>
                    </div>
                    {{-- <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a> --}}
                    <div class="nav-item dropdown">
                         @if (Auth::guard('teacher')->check() || Auth::guard('student')->check() )
                            <a href="#" class="nav-link dropdown-toggle btn btn-primary py-4 px-lg-5 d-none d-lg-block" data-bs-toggle="dropdown">{{ Auth::guard('teacher')->user()->name ?? Auth::guard('student')->user()->name }} <i class="fa fa-arrow-right ms-3"></i></a>
                            <div class="dropdown-menu fade-down m-0">
                                <a href="{{ Auth::guard('student')->check() ? route('students.profile') : route('teacher.profile') }}" class="dropdown-item">{{ trans('homepage.m-profile') }}</a>
                                <a href="{{ Auth::guard('teacher')->check() ? route('students.signOut') : route('teachers.signOut') }}" class="dropdown-item">{{ trans('homepage.logout') }}</a>
                            </div> 
                         @else
                         <a href="#" class="nav-link dropdown-toggle btn btn-primary py-4 px-lg-5 d-none d-lg-block" data-bs-toggle="dropdown">{{ trans('homepage.join-now') }} <i class="fa fa-arrow-right ms-3"></i></a>
                         <div class="dropdown-menu fade-down m-0">
                             <a href="{{ route('login') }}" class="dropdown-item">{{ trans('homepage.as-admin') }}</a>
                             <a href="{{ url('/sessions/signIn-teacher') }}" class="dropdown-item">{{ trans('homepage.as-teacher') }}</a>
                             <a href="{{ url('/sessions/signIn') }}" class="dropdown-item">{{ trans('homepage.as-student') }}</a>
                         </div>
                         @endif                  
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->