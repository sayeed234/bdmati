<!DOCTYPE html>

<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> @yield('title')</title>
    <link rel="icon" style="border-radius:50%" href="img/favi.png" type="image/gif" sizes="16x16">

        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('website/css/bootstrap.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('website/css/bootstrap-responsive.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('website/css/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('website/css/pluton.css')}}" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="{{asset('website/css/pluton-ie7.css')}}" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="{{asset('website/css/jquery.cslider.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('website/css/jquery.bxslider.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('website/css/animate.css')}}" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('website/images/ico/apple-touch-icon-144.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('website/images/ico/apple-touch-icon-114.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('website/images/apple-touch-icon-72.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('website/images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico')}}">
    </head>
    
    <body>
     
         <div class="page-wrapper">
        <!-- START HEADER-->
          @include('font.include.header')

        <!-- END HEADER-->

        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
         @yield('content')

            <!-- END PAGE CONTENT-->
      
      </div>
    </div>
	
	<!-- End main content -->	
			
			
	<!-- Start footer -->
	    @include('font.include.footer')
	<!-- End footer -->


        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; 2020 Developed @ LS Computer School</p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="{{asset('website/js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('website/js/jquery.mixitup.js')}}"></script>
        <script type="text/javascript" src="{{asset('website/js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{asset('website/js/modernizr.custom.js')}}"></script>
        <script type="text/javascript" src="{{asset('website/js/jquery.bxslider.js')}}"></script>
        <script type="text/javascript" src="{{asset('website/js/jquery.cslider.js')}}"></script>
        <script type="text/javascript" src="{{asset('website/js/jquery.placeholder.js')}}"></script>
        <script type="text/javascript" src="{{asset('website/js/jquery.inview.js')}}"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script async="" defer="" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="{{asset('website/js/respond.min.js')}}"></script>
        <![endif]-->
        <script type="text/javascript" src="{{asset('website/js/app.js')}}"></script>
        
    </body>
</html>