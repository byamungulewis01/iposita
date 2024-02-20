<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>

    <!--begin::Base Path (base relative path for assets2 of this page) -->
    <base href="../">

    <!--end::Base Path -->
    <meta charset="utf-8"/>
    <title>Login : IPOSITA</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{asset('assets/css/pages/login/classic/login-3.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset("img/logo.png")}}"/>
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{asset('assets/media/bg/bg-2.jpg')}});">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-15">
                    <a href="#">
                        <img src="{{asset("img/iposita.png")}}" class="max-h-100px rounded-pill" alt="" />
                    </a>
                </div>
                <!--end::Login Header-->
                <!--begin::Login Sign in form-->
                <div class="login-signin">
                    <div class="mb-20">
                        <h3>Sign In To  Iposita</h3>
                    </div>

                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-custom alert-success fade show py-2" role="alert">
                            <div class="alert-icon"><i class="la la-check-circle"></i></div>
                            <div class="alert-text">
                                <span>{{ \Illuminate\Support\Facades\Session::get('success') }}</span>
                            </div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                </button>
                            </div>
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('error'))
                        <div class="alert alert-custom alert-danger fade show py-2" role="alert">
                            <div class="alert-icon"><i class="la la-warning"></i></div>
                            <div class="alert-text">
                                <span>{{ \Illuminate\Support\Facades\Session::get("error") }}</span>
                            </div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <form class="form" id="kt_login_signin_form" method="POST" action="{{ route('login')}}">
                        @csrf
                        <div class="form-group text-left">
                            <label for="" class="ml-5" style="color: white !important;">Email</label>
                            <input type="hidden" id="fcm_token" name="fcm_token">
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                                   type="text"
                                   value="{{ old('email') }}"
                                   style="background-color: white !important;color: black !important;"
                                   placeholder="User Name" name="email" required />
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group text-left">
                            <label for="" class="ml-5 white" style="color: white !important;">Password</label>
                            <div class="input-icon input-icon-right">
                                <input style="background-color: white !important;color: black !important;" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password"
                                       placeholder="Password" name="password" id="password" required />
                                <span><i class="flaticon-eye icon-md" id="show-password"></i></span>
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        @if (Route::has('password.request'))
                            <div class="col kt-align-right">
                                <a href="{{ url('/password/reset') }}" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>
                            </div>
                        @endif
                        <div class="form-group text-center mt-10">
                            <button id="kt_login_signin_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Sign In</button>
                        </div>
                    </form>
                </div>
                <!--end::Login Sign in form-->
            </div>
        </div>
    </div>
    <!--end::Login-->
</div>
</body>

<!-- end::Body -->

<script>
    //toggle show password icon
    document.getElementById('show-password').addEventListener('click', function() {
        var password = document.getElementById('password');
        const hideEyeIcon = ['fa','fa-eye-slash'];
        if (password.type === 'password') {
            password.type = 'text';
            this.classList.remove('flaticon-eye');
            this.classList.add(...hideEyeIcon);
        } else {
            password.type = 'password';
            this.classList.remove(...hideEyeIcon);
            this.classList.add('flaticon-eye');
        }
    });
</script>
</html>

