<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Find Solicitors</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front-asset/css/bootstrap.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('front-asset/css/style.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    @yield('css')
</head>

<body>
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav">
                            <li class="nav-item active"><a class="nav-link" href="{{url('home')}}">Find Solicitor</a></li>
                        </ul>
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="{{url('LogoutWithPassword')}}">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <div style="padding: 100px 0px 300px 0px; background-color: rgb(240,240,240);">
    @yield('content')
    </div>

    
    <footer class="footer-area">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p> Copyright &copy;<script>document.write(new Date().getFullYear());</script> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

<script src="{{asset('front-asset/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('front-asset/js/bootstrap.min.js')}}"></script>

@yield('js')

</html>