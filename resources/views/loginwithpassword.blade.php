
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Capacity System</title>

        <meta name="description" content="">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="">
        <meta property="og:site_name" content="">
        <meta property="og:description" content="">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{asset('assets/css/dashmix.min.css')}}">
    </head>
    <body>
       
        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('assets/media/photos/photo19@2x.jpg');">
                    <div class="row no-gutters justify-content-center bg-primary-dark-op">
                        <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                            <!-- Sign In Block -->
                            <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                                <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                                    <!-- Header -->
                                    <div class="mb-2 text-center">
                                        <p class="text-uppercase font-w700 font-size-sm text-muted">Enter the password</p>
                                    </div>
                                    
                                    <form class="js-validation-signin" action="{{url('LoginWithPasswordPost')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="login-password" placeholder="Password">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-asterisk"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            @if($errors->any())
                                            <p style="color:red;">{{$errors->first()}}</p>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-hero-primary">
                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Enter
                                            </button>
                                        </div>
                                    </form>
                                    <!-- END Sign In Form -->
                                </div>
                               
                            </div>
                            <!-- END Sign In Block -->
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
        </div>
        
    </body>
</html>
