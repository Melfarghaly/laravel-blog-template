<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="no-js">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
		<!-- Author Meta -->
		<meta name="author" content="@weybansky">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>
			@yield('page') | {{ env('APP_NAME') }}
		</title>
		
		{{-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> --}}

		{{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
		{{-- font-family: 'Raleway', sans-serif; --}}
		
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
		<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">

		{{-- <base href="{{ url('') }}" target=""> --}}

		@yield('head')
	</head>
	<body>