<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('تسجيل الدخول') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-purple.min.css') }}">

    @if (app()->getLocale() == 'ar')
    <style>
        body{
            direction: rtl
        }
    </style>
@endif
</head>

<body>
    <div class="auth-layout-wrap" style="background-image: url({{ asset('assets/images/photo-wide-4.jpg') }})">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6 text-center "
                        style="background-size: cover;background-image: url({{ asset('assets/images/photo-long-3.jpg') }})">
                        <div class="ps-3 auth-right">
                            <div class="auth-logo text-center mt-4">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                            </div>
                            <div class="flex-grow-1"></div>
                            <div class="w-100 mb-4">
                                <a class="btn btn-outline-primary btn-outline-email w-100 btn-icon-text btn-rounded"
                                    href="{{ route('signInTeacher') }}">
                                    <i class="i-Mail-with-At-Sign"></i> Sign in with Email
                                </a>
                                
                            </div>
                            <div class="flex-grow-1"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-4">
                            <a style="color: #663399 !important" class=" btn-outline-google w-100 btn-icon-text my-3">
                                <i class="i-Google-Plus"></i>  واجهة تسجيل  طالب جديد 
                            </a>
                            <h1 class="mb-3 text-18">Sign Up</h1>
                            <form method="POST" action="{{ route('students.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="username">{{ trans('form.name') }}</label>
                                    <input id="name" type="text"
                                        class="form-control-rounded form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ trans('form.email') }}</label>
                                    <input id="email" type="email"
                                        class="form-control-rounded form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ trans('form.password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control-rounded form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="repassword">{{ trans('form.confirmpassword') }}</label>
                                    <input id="password-confirm" type="password"
                                        class="form-control-rounded form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="school_id">{{ trans('sidebar.schools') }}</label>
                                    <select name="school_id" class="form-control form-control-rounded">
                                        <option selected></option>
                                        @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="class_id">{{ trans('form.classLevel') }}</label>
                                    <select name="class_id" class="form-control form-control-rounded">
                                        <option selected></option>
                                        @foreach ($classLevels as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 btn-rounded mt-3">Sign
                                    Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/common-bundle-script.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
