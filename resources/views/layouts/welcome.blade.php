<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <!--====== Title ======-->
    <title>MOINI</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ URL::to('welcome/images/favicon.png" type="image/png') }}">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ URL::to('welcome/css/magnific-popup.css') }}">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ URL::to('welcome/css/slick.css') }}">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ URL::to('welcome/css/LineIcons.css') }}">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ URL::to('welcome/css/bootstrap.min.css') }}">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ URL::to('welcome/css/default.css') }}">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ URL::to('welcome/css/style.css') }}">
</head>

<body>
    <!--====== PRELOADER PART START ======-->

    {{-- <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!--====== PRELOADER PART ENDS ======-->


            @yield('content')


    {{-- js for the welcome page --}}
     <!--====== Jquery js ======-->
     <script src="{{ URL::to('welcome/js/vendor/jquery-1.12.4.min.js') }}"></script>
     <script src="{{ URL::to('welcome/js/vendor/modernizr-3.7.1.min.js') }}"></script>
     
     <!--====== Bootstrap js ======-->
     <script src="{{ URL::to('welcome/js/popper.min.js') }}"></script>
     <script src="{{ URL::to('welcome/js/bootstrap.min.js') }}"></script>
     
     <!--====== Slick js ======-->
     <script src="{{ URL::to('welcome/js/slick.min.js') }}"></script>
     
     <!--====== Magnific Popup js ======-->
     <script src="{{ URL::to('welcome/js/jquery.magnific-popup.min.js') }}"></script>
     
     <!--====== Ajax Contact js ======-->
     <script src="{{ URL::to('welcome/js/ajax-contact.js') }}"></script>
     
     <!--====== Isotope js ======-->
     <script src="{{ URL::to('welcome/js/imagesloaded.pkgd.min.js') }}"></script>
     <script src="{{ URL::to('welcome/js/isotope.pkgd.min.js') }}"></script>
     
     <!--====== Scrolling Nav js ======-->
     <script src="{{ URL::to('welcome/js/jquery.easing.min.js') }}"></script>
     <script src="{{ URL::to('welcome/js/scrolling-nav.js') }}"></script>
     
     <!--====== Main js ======-->
     <script src="{{ URL::to('welcome/js/main.js') }}"></script>

</body>

</html>
