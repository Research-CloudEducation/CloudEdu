<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ __('تسجــل الدخـول') }}</title>
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
                    <div class="col-md-6">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                            </div>
                            <h1 class="mb-3 text-18 text-center">{{ trans('homepage.signIn') }} : طالــب</h1>
                            <form method="POST" action="{{ url('/SignIn-student') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="email">{{ trans('form.email') }}</label>
                                    <input type="email" id="email"
                                        class="form-control form-control-rounded @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ trans('form.password') }}</label>
                                    <input type="password" id="password"
                                        class="form-control form-control-rounded @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <div class="">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-rounded btn-primary w-100 mt-2">Sign In</button>

                            </form>
                            @if (Route::has('password.request'))
                                <div class="mt-3 text-center">

                                    <a href="{{ route('password.request') }}" class="text-muted"><u>Forgot
                                            Password?</u></a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 text-center "
                        style="background-size: cover;background-image: url({{ asset('assets/images/photo-long-3.jpg') }}">
                        <div class="pe-3 auth-right">
                            <a class="btn btn-rounded btn-outline-primary btn-outline-email w-100 btn-icon-text"
                                href="{{ route('signUp-student') }}">
                                <i class="i-Mail-with-At-Sign"></i> Sign up with Email
                            </a>
                            
                            
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
