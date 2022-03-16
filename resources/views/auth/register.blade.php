<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>Register Page - Allo Help Desk Ticketing System</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.cs') }}s">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="{{ route('register') }}">
                            <img src="{{ asset('backend/images/allo-tnb.png') }}" alt="" style="width:35px;height:35px;">
                            <h2 class="brand-text text-primary ms-1">Allo HDTS</h2>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid" src="{{ asset('app-assets/images/pages/register-v2.svg') }}"
                                    alt="Register V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Register-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">

                                <x-jet-validation-errors class="mb-4" style="color:red;" />

                                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-red-600" style="color:red;">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <h2 class="card-title fw-bold mb-1">Adventure starts here 🚀</h2>
                                <p class="card-text mb-2">Fill In Required Fields</p>

                                <form class="auth-register-form mt-2" action="{{ route('register') }}" method="POST">
                                    @csrf

                                    <div class="mb-1">
                                        <label class="form-label" for="register-username">Full Name <span class="text-danger">*</span></label>
                                        <input class="form-control" id="name" type="text" name="name"
                                            placeholder="johndoe" aria-describedby="register-username" required
                                            autofocus="name" tabindex="1" />
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label" for="register-email">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" id="email" type="email" name="email"
                                            placeholder="john@example.com" aria-describedby="register-email"
                                            tabindex="2" required />
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label" for="register-password">Password <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password"
                                                name="password" placeholder="············" required
                                                aria-describedby="register-password" tabindex="3" /><span
                                                class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label" for="register-password">Confirm Password <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password_confirmation"
                                                type="password" name="password_confirmation" placeholder="············"
                                                required aria-describedby="register-password" tabindex="3" /><span
                                                class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span>
                                        </div>
                                    </div>

                                    <br>

                                    {{-- <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="register-privacy-policy" type="checkbox"
                                                tabindex="4" />
                                            <label class="form-check-label" for="register-privacy-policy">I agree to<a
                                                    href="#">&nbsp;privacy policy & terms</a></label>
                                        </div>
                                    </div> --}}

                                    <button type="submit " class="btn btn-primary w-100" tabindex="5">Sign up</button>

                                </form>

                                <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>
                                <p class="text-center mt-2"><span>Already have an account?</span><a
                                        href="{{ route('login') }}"><span>&nbsp;Sign in instead</span></a></p>
                            </div>
                        </div>
                        <!-- /Register-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/auth-register.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>