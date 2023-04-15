<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='csrf-token' content="{{ csrf_token() }}">

	<!--favicon-->
	<link rel="icon" href="{{ asset('uploads/blog_favicon.png') }}" type="image/png" />

	<!--plugins-->
	@yield("style")
	<link href="{{ asset('admin_dist/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_dist/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_dist/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

	<!-- loader-->
	<link href="{{ asset('admin_dist/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('admin_dist/js/pace.min.js') }}"></script>

	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin_dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('admin_dist/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_dist/css/icons.css') }}" rel="stylesheet">
	{{-- <link href="{{ asset('admin_dist/css/font_awesome_5_free.min.css') }}" rel="stylesheet"> --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('admin_dist/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_dist/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_dist/css/header-colors.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_dist/css/my_style.css') }}" />
    
    <title>Admin Dashboard</title>
</head>

<body>

    @if(Session::has('success'))
        <div class='general-message alert alert-info'>{{ Session::get('success') }}</div>
    @endif

    @if(Session::has('error'))
        <div class='general-message alert alert-danger'>{{ Session::get('error') }}</div>
    @endif

	<!--main content wrapper-->
	<div class="wrapper">
		@include("admin.layout.navbar")
		@include("admin.layout.sidebar")
		@yield("main_content")
		<div class="overlay toggle-icon"></div>
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<footer class="page-footer">
			<p class="mb-0">© {{ date('Y') }} | All right reserved | The IhechiOkorie's blog</p>
		</footer>
	</div>
	<!--End of main content wrapper-->

    
	<script src = " https://ajax.googleapis.com/ajax/libs/jQuery/3.3.1/jQuery.min.js "></script>
	<!-- Bootstrap JS -->
	<script src="{{ asset('admin_dist/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('admin_dist/js/jquery.min.js') }}"></script>
	<script src="{{ asset('admin_dist/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('admin_dist/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('admin_dist/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('admin_dist/js/app.js') }}"></script>
	@yield("script")
</body>

</html>
