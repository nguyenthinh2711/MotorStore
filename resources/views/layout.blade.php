<!DOCTYPE html>
<html lang="en">


<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Motor Store</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Motor Store">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{asset('assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset('assets/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/rating.css')}}">
</head>

<body>
    <div class="page-wrapper">
    
    
    <!--LOADER-->
    <div class="loader">
        <div class="loader-spinner"></div>
    </div>
    <!--LOADER-->
   
    <!-- START HEADER NAVIGATION -->

                @include('layouts.menutop')

    <!-- END HEADER NAVIGATION -->
    
    <main class="main">
        @yield('content')
    </main><!-- End .main -->
    
    <!--footer1 sec start-->
    <footer class="footer footer-dark">
        @include('layouts.footer')
    </footer><!-- End .footer -->
    <!--foo0ter1 sec end-->
</div><!-- End .page-wrapper -->
    
     <!-- Plugins JS File -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="{{asset('assets/js/jquery.min.js')}}"></script>
     <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('assets/js/jquery.hoverIntent.min.js')}}"></script>
     <script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
     <script src="{{asset('assets/js/superfish.min.js')}}"></script>
     <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
     <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
     <!-- Main JS File -->
     <script src="{{asset('assets/js/main.js')}}"></script>
 </body>
 
 
 <!-- molla/index-2.html  22 Nov 2019 09:55:42 GMT -->
 </html>