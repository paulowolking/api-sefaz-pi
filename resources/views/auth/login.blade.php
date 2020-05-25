<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('gestor/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('gestor/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('gestor/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('gestor/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('gestor/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('gestor/js/modernizr.min.js') }}"></script>

</head>


<body class="account-pages">

<!-- Begin page -->
<div class="accountbg" style="background: url('{{ asset('gestor/images/bg-1.jpg') }}');background-size: cover;background-position: center;"></div>

<div class="wrapper-page account-page-full">

    <div class="card">
        <div class="card-block">

            <div class="account-box">

                <div class="card-box p-5">
                    <h2 class="text-uppercase text-center pb-4">
                        <a href="{{ route('welcome') }}" class="text-success">
                            <span><img src="{{ asset('gestor/images/logo_light.png') }}" alt="" height="26"></span>
                        </a>
                    </h2>

                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group m-b-20 row">
                            <div class="col-12">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row m-b-20">
                            <div class="col-12">
                                <label for="password">{{ __('Password') }}</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row m-b-20">
                            <div class="col-12">

                                <div class="checkbox checkbox-custom">
                                    <input id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group row text-center m-t-10">
                            <div class="col-12">
                                <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                    </form>

                    @if (Route::has('register'))
                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">{{ __('Not have an account yet?') }} <a href="{{ route('register') }}" class="text-dark m-l-5"><b>{{ __('Register') }}</b></a></p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>

    <div class="m-t-40 text-center">
        <p class="account-copyright">2020 © {{ config('app.name') }} - dimenutolabs.com.br</p>
    </div>

</div>



<!-- jQuery  -->
<script src="{{ asset('gestor/js/jquery.min.js') }}"></script>
<script src="{{ asset('gestor/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('gestor/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('gestor/js/waves.js') }}"></script>
<script src="{{ asset('gestor/js/jquery.slimscroll.js') }}"></script>

<!-- App js -->
<script src="{{ asset('gestor/js/jquery.core.js') }}"></script>
<script src="{{ asset('gestor/js/jquery.app.js') }}"></script>

</body>
</html>