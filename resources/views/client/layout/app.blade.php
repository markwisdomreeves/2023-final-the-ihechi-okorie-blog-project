<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>@yield('title')</title>

	<meta name="_token" content="{{ csrf_token() }}" />
	<link rel="icon" href="{{ asset('uploads/blog_favicon.png') }}" type="image/png" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('front_dist/css/animate.css') }}" />
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('front_dist/css/bootstrap.css') }}" />
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('front_dist/css/flexslider.css') }}" />
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('front_dist/css/icomoon.css') }}" />
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('front_dist/css/magnific-popup.css') }}" />
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('front_dist/css/owl.carousel.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('front_dist/css/owl.theme.default.min.css') }}" />
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{ asset('front_dist/fonts/flaticon/font/flaticon.css') }}" />
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('front_dist/css/style.css') }}" />

	<link rel="stylesheet" href="{{ asset('custom_css/mystyle.css') }}" />

	<!-- Modernizr JS -->
	<script src="{{ asset('front_dist/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
 
    {{-- Loader section --}}
    <div class="colorlib-loader"></div>

		
	<div id="page">
		{{-- Navbar Section --}}
		@include('./client/layout/navbar')


        {{-- Main Blog Content --}}
        @yield('main_content')


        {{-- News Letter form --}}
		{{-- @include('./client/layout/news_letter_form') --}}


		{{-- Footer section --}}
		@include('./client/layout/footer')
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop">
            <i class="icon-arrow-up2"></i>
        </a>
	</div>
		<!-- jQuery -->
		<script src="{{ asset('front_dist/js/jquery.min.js') }}"></script>
		<!-- jQuery Easing -->
		<script src="{{ asset('front_dist/js/jquery.easing.1.3.js') }}"></script>
		<!-- Bootstrap -->
		<script src="{{ asset('front_dist/js/bootstrap.min.js') }}"></script>
		<!-- Waypoints -->
		<script src="{{ asset('front_dist/js/jquery.waypoints.min.js') }}"></script>
		<!-- Stellar Parallax -->
		<script src="{{ asset('front_dist/js/jquery.stellar.min.js') }}"></script>
		<!-- Flexslider -->
		<script src="{{ asset('front_dist/js/jquery.flexslider-min.js') }}"></script>
		<!-- Owl carousel -->
		<script src="{{ asset('front_dist/js/owl.carousel.min.js') }}"></script>
		<!-- Magnific Popup -->
		<script src="{{ asset('front_dist/js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('front_dist/js/magnific-popup-options.js') }}"></script>
		<!-- Counters -->
		<script src="{{ asset('front_dist/js/jquery.countTo.js') }}"></script>
		<!-- Main -->
		<script src="{{ asset('front_dist/js/main.js') }}"></script>


		@yield('custom_css')

	</body>
</html>

