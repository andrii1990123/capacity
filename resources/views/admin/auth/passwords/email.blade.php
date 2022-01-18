<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Capacity system</title>

        <meta name="description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Dashmix">
        <meta property="og:description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        

        <!-- Stylesheets -->
        <!-- Fonts and Dashmix framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{asset('assets/css/dashmix.min.css')}}">

        <style type="text/css">
            .error-text{
                color:red;
            }
        </style>

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        
        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="bg-image">
                    <div class="row no-gutters justify-content-center bg-black-75">
                        <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                            <!-- Reminder Block -->
                            <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                                <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                                    <!-- Header -->
                                    <div class="mb-2 text-center">
                                        
                                        <p class="text-uppercase font-w700 font-size-sm text-muted">Password Reminder</p>
                                    </div>
                                    <!-- END Header -->

                                    <!-- Reminder Form -->
                                    <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _es6/pages/op_auth_reminder.js) -->
                                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <form class="js-validation-reminder" action="{{ url('admin/password/email') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="reminder-credential" name="email" value="{{ old('email') }}" placeholder="Email">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-user-circle"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block error-text">
                                                    {{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-hero-warning">
                                                <i class="fa fa-fw fa-reply mr-1"></i> Send Reset Password Link
                                            </button>
                                        </div>
                                    </form>
                                    <div class="col s12" style="text-align: center;">
                                        <a href="{{ url('/admin') }}" title="" class="primary-text light">Back to login</a>
                                    </div>
                                    <!-- END Reminder Form -->
                                </div>
                            </div>
                            <!-- END Reminder Block -->
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!--
            Dashmix JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/js.cookie.min.js
        -->
        <script src="{{asset('assets/js/dashmix.core.min.js')}}"></script>

        <!--
            Dashmix JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="{{asset('assets/js/dashmix.app.min.js')}}"></script>

        <!-- Page JS Plugins -->
        <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{asset('assets/js/pages/op_auth_signin.min.js')}}"></script>
    </body>
</html>
