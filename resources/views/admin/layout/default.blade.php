<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->

        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and Dashmix framework -->
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        

        @yield('css')
        <link rel="stylesheet" id="css-main" href="{{asset('assets/css/dashmix.min.css')}}">
        
        <link rel="stylesheet" id="css-main" href="{{asset('assets/css/themes/xdream.min.css')}}">        
    </head>
    <body>
       
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow sidebar-dark">
            <!-- Side Overlay-->
            
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
            @include('admin.includes.verticalnav')
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
              @include('admin.includes.header')
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                @yield('content')

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            @include('admin.includes.footer')
            <!-- END Footer -->
        </div>
        
        <script src="{{asset('assets/js/dashmix.core.min.js')}}"></script>

        <script src="{{asset('assets/js/dashmix.app.min.js')}}"></script>
        @yield('js')
    </body>
</html>
